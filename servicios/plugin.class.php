<?php
namespace DrivemePurchase;

use WP_Post;

include DRIVEME_PURCHASE_PLUGIN_LIB_DIR . "rezdy.class.php";

class Plugin
{
    private static $initialized = false;
    private static $instance = false;

    public function __construct()
    {
        if (!self::$initialized) {
            self::$initialized = true;
            self::$instance = $this;
            load_plugin_textdomain('driveme-purchase', false, DRIVEME_PURCHASE_PLUGIN_RELATIVE_DIR . '/language/');
            $this->init_hooks();
        }
    }

    public static function getInstance(): Plugin
    {
        return self::$instance;
    }

    /**
     * Initializes WordPress hooks
     */
    private function init_hooks()
    {
        add_shortcode('driveme-purchase', function () {
            $this->renderPage();
        });

        add_shortcode('driveme-book', function ($atts) {
            $atts = shortcode_atts( array(
                'product_id' => -1,
            ), $atts );
            return $this->renderBook($atts);
        });

        add_action('wp_head', function () {
            if (get_the_ID() == DRIVEME_PURCHASE_PAGE_ID) {
                $this->enqueueResources();
            }
        });

        // api hooks
        add_action('wp_ajax_get_availability', function () {
            $this->displayAvailability();
            wp_die();
        });
        add_action('wp_ajax_nopriv_get_availability', function () {
            $this->displayAvailability();
            wp_die();
        });
        add_action('wp_ajax_get_full_availability', function () {
            $this->displayFullAvailability();
            wp_die();
        });
        add_action('wp_ajax_nopriv_get_full_availability', function () {
            $this->displayFullAvailability();
            wp_die();
        });
        add_action('wp_ajax_get_product', function () {
            $this->displayProduct();
            wp_die();
        });
        add_action('wp_ajax_nopriv_get_product', function () {
            $this->displayProduct();
            wp_die();
        });
        add_action('wp_ajax_get_voucher', function () {
            $this->displayVoucher();
            wp_die();
        });
        add_action('wp_ajax_nopriv_get_voucher', function () {
            $this->displayVoucher();
            wp_die();
        });
        add_action('wp_ajax_book', function () {
            $this->book();
            wp_die();
        });
        add_action('wp_ajax_nopriv_book', function () {
            $this->book();
            wp_die();
        });
        add_action('wp_ajax_quote', function () {
            $this->quote();
            wp_die();
        });
        add_action('wp_ajax_nopriv_quote', function () {
            $this->quote();
            wp_die();
        });
    }
    public function book()
    {
        $api = new Rezdy(DRIVEME_PURCHASE_API_KEY);

        $data = $this->prepareData($api);
        if (empty($data)) {
            return null;
        }

        $data = apply_filters('driveme_purchase_pre_book_event', $data);

        $bookingResult = $api->book($data);

        $bookingResult = apply_filters('driveme_purchase_post_book_event', $bookingResult, $data);

        echo $bookingResult;
    }

    public function quote()
    {
        $api = new Rezdy(DRIVEME_PURCHASE_API_KEY);

        $data = $this->prepareData($api);
        if (empty($data)) {
            return null;
        }

        $data = apply_filters('driveme_purchase_pre_quote_event', $data);

        $quoteResult = $api->quote($data);

        $quoteResult = apply_filters('driveme_purchase_post_quote_event', $quoteResult, $data);

        echo $quoteResult;
    }

    public function prepareData($api) {
        $productCode = (string)$_POST['productCode'];

        $data = [];
        parse_str($_POST['bookData'], $data);
        if (empty($data['booking'])) {
            return null;
        }
        $bookData = $data['booking'];

        $extras = [];
        if (!empty($bookData['extra'])) {
            foreach ($bookData['extra'] as $extraName) {
                $quantity = $bookData['extra_quantities'][$extraName] ?? 1;
                if ($extraObject = $api->getExtraByName($extraName)) {

                    $extras[] = [
                        'id' => $extraObject->id,
                        'name' => $extraName,
                        'quantity' => $quantity,
                    ];
                }
            }
            unset($bookData['extra']);
            unset($bookData['extra_quantities']);
        }

        $priceOptions = [];
        if (!empty($bookData['prices'])) {
            $product = $api->getProduct( $productCode );
            if ( !empty($product) ) {
                $product = json_decode( $product );
                if ( isset($product->requestStatus->success) && $product->requestStatus->success ) {
                    $product = $product->product;
                    foreach ( $bookData['prices'] as $priceOptionName => $priceOptionQty ) {
                        if ( intval($priceOptionQty) > 0 ) {
                            foreach( $product->priceOptions as $priceOption ) {
                                if ( $priceOption->label == $priceOptionName ) {
                                    $priceOptions[] = [
                                        'optionId' => $pricesObject->id,
                                        'optionLabel' => $priceOptionName,
                                        'value' => $priceOptionQty,
                                    ];
                                }
                            }
                        }
                    }
                }
            }
            unset($bookData['prices']);
        }

        $voucher = '';
        if (!empty($bookData['coupon'])) {
            $result = json_decode($this->getVoucher($bookData['coupon']));
            if ($result && !empty($result->requestStatus->success)) {
                $voucher = $result->voucher;
            }
        }

        $quantities = [];
        if ( !empty($priceOptions) ) {
            $quantities = $priceOptions;
        }

        if ( empty($quantities) ) {
            $quantities = [
                [
                    'optionLabel' => 'Participant',
                    'value' => 1
                ]
            ];
        }

        $item = [
            'productCode' => $productCode,
            'quantities' => $quantities,
        ];

        if ( !empty($extras) ) {
            $item['extras'] = $extras;
        }
        if ( !empty($extras) ) {
            $item['extras'] = $extras;
        }
        if ( !empty($voucher) ) {
            $item['vouchers'][] = $voucher;
        }

       //	EBG 07-12-21
        $redsysvalue = (explode( '-' , $bookData['creditCard']['cardToken'] ));
        $bookData['payment']['paymentType'] = 'CASH';
        $payment['amount'] = $redsysvalue[1];
        $payment['currency'] = 'EUR';
        $payment['type'] = 'OTHER';
        $payment['date'] = date('Y-m-d H:i:s');
        $payment['label'] = $redsysvalue[0];
        $bookData['payments'] = [$payment];
        unset( $bookData['creditCard'] );
        //	EBG 07-12-21

        // startTime is always required :$
        if (!empty($data['date'])) {
            $date = new \DateTimeImmutable($data['date']);
            //$item['startTime'] = $date->format('Y-m-d\TH:i:s\Z');
            $item['startTimeLocal'] = $date->format('Y-m-d H:i:s');
        } else {
            $date = null;
        }

        if (!empty($bookData['gift'])) {
            $bookData['sendNotifications'] = false;
            if ( !empty($bookData['comments']) ) {
                $bookData['comments'] .= "\n";
            }

            if ( $bookData['gift_date'] == 'open' ) {
                global $DISABLED_DATE_PARTS;
                $disabled = sprintf('%d-%02d-%02d %02d:%02d:00',
                    date('Y', strtotime("+1 year")),
                    $DISABLED_DATE_PARTS['month'],
                    $DISABLED_DATE_PARTS['day'],
                    $DISABLED_DATE_PARTS['hour'],
                    $DISABLED_DATE_PARTS['minute']
                );

                $item['startTimeLocal'] = $disabled;
                $bookData['comments'] .= 'GIFT - OPEN DATE';
            } else {
                $bookData['comments'] .= 'GIFT - SPECIFIC DATE';
            }
        }
        $bookData['items'] = [$item];

		return $bookData;
    }

    public function displayVoucher()
    {
        $voucherCode = (string)$_POST['voucherCode'];
        $voucher = $this->getVoucher($voucherCode);
        echo $voucher;
    }

    public function displayAvailability()
    {
        $date = new \DateTimeImmutable($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
        $productCode = (string)$_POST['productCode'];
        $availability = $this->getAvailability($productCode, $date);
        echo $availability;
    }

    public function displayFullAvailability()
    {
        $date = new \DateTimeImmutable($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
        $productCode = (string)$_POST['productCode'];
        $availability = $this->getFullAvailability($productCode, $date);
        echo $availability;
    }

    public function displayProduct()
    {
        $productCode = (string)$_POST['productCode'];
        $product = $this->getProduct($productCode);
        echo $product;
    }

    public function getAvailability(string $productCode, \DateTimeInterface $date)
    {
        $api = new Rezdy(DRIVEME_PURCHASE_API_KEY);
        return $api->getAvailability($productCode, $date);
    }

    public function getFullAvailability(string $productCode, \DateTimeInterface $date)
    {
        $api = new Rezdy(DRIVEME_PURCHASE_API_KEY);
        return $api->getFullAvailability($productCode, $date);
    }

    public function getProduct(string $productCode)
    {
        $api = new Rezdy(DRIVEME_PURCHASE_API_KEY);
        return $api->getProduct($productCode);
    }

    public function getVoucher(string $voucherCode)
    {
        $api = new Rezdy(DRIVEME_PURCHASE_API_KEY);
        return $api->getVoucher($voucherCode);
    }

    private function enqueueResources()
    {
        wp_register_script('popper-js', DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'vendor/popper.min.js', ['jquery'],
            '1.14.7');
        wp_enqueue_script('popper-js');

        wp_register_script('jquery-ui-js', DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'vendor/jquery-ui-1.12.1/jquery-ui.min.js',
            ['jquery'],
            '1.12.1');
        wp_enqueue_script('jquery-ui-js');

        wp_register_script('stripe-js', 'https://js.stripe.com/v2/',
            ['jquery'],
            '2.4.19.3');
        wp_enqueue_script('stripe-js');

        wp_register_style('jquery-ui-css',
            DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'vendor/jquery-ui-1.12.1/jquery-ui.min.css', [],
            '1.12.1');
        wp_enqueue_style('jquery-ui-css');

        wp_register_script('driveme-purchase-js', DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'js/driveme-purchase.js',
            ['jquery'],
            DRIVEME_PURCHASE_PLUGIN_VERSION);
        wp_enqueue_script('driveme-purchase-js');

        wp_register_script('driveme-common-js', DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'js/common.js',
            ['jquery', 'driveme-purchase-js'],
            DRIVEME_PURCHASE_PLUGIN_VERSION);
        wp_enqueue_script('driveme-common-js');

        wp_localize_script('driveme-purchase-js', 'DrivemePurchase', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'ITEM_TYPE_EXTRA' => Rezdy::ITEM_TYPE_EXTRA,
                'ITEM_TYPE_VOUCHER' => Rezdy::ITEM_TYPE_VOUCHER,
                'ITEM_TYPE_MAIN' => Rezdy::ITEM_TYPE_MAIN,
                'VOUCHER_EXPIRED' => __('Voucher has expired', 'driveme-purchase'),
                'VOUCHER_INVALID' => __('Voucher is not valid', 'driveme-purchase'),
                'VOUCHER_NOT_ISSUED' => __('Voucher not issued', 'driveme-purchase'),
                'STRIPE_PUBLIC_KEY' => DRIVEME_STRIPE_PUBLIC_KEY,
                'CURRENT_LANG' => apply_filters( 'wpml_current_language', NULL ),
            ]
        );

        wp_register_script('bootstrap-js',
            DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'vendor/bootstrap-4.3.1/js/bootstrap.min.js', ['jquery'],
            '4.3.1');
        wp_enqueue_script('bootstrap-js');
        wp_register_style('driveme-purchase-css', DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'css/driveme-purchase.css', [],
            DRIVEME_PURCHASE_PLUGIN_VERSION);
        wp_enqueue_style('driveme-purchase-css');
        wp_register_style('bootstrap-css',
            DRIVEME_PURCHASE_PLUGIN_DIR_URI . 'vendor/bootstrap-4.3.1/css/bootstrap.min.css', [],
            DRIVEME_PURCHASE_PLUGIN_VERSION);
        wp_enqueue_style('bootstrap-css');
    }

    private function renderPage()
    {

        if ( empty( $_GET['pid'] ) ) {
            return;
        }

         if ( is_admin() ) {
            return ;
        }

        switch( $this->getProductBookingType() ) {
            case BOOKING_TYPE_VIRTUAL_REALITY:
                include DRIVEME_PURCHASE_PLUGIN_TEMPLATE_DIR . 'booking-virtual-reality.php';
                break;
            case BOOKING_TYPE_TRACK_DAYS:
                include DRIVEME_PURCHASE_PLUGIN_TEMPLATE_DIR . 'booking-track-days.php';
                break;
            case BOOKING_TYPE_GYMKHANA:
                include DRIVEME_PURCHASE_PLUGIN_TEMPLATE_DIR . 'booking-gymkhana.php';
                break;
            case BOOKING_TYPE_GIFT_CARD:
                include DRIVEME_PURCHASE_PLUGIN_TEMPLATE_DIR . 'booking-gift-card.php';
                break;
            case BOOKING_TYPE_DEFAULT:
            default:
                include DRIVEME_PURCHASE_PLUGIN_TEMPLATE_DIR . 'booking.php';
                return;
        }
    }

    private function renderBook($atts) {

         if ( is_admin() ) {
            return ;
        }

        $price = get_field('price', (int)$atts['product_id']);
        if  ( is_numeric($price) ) {
            $price .= '€';
        } else {
            $price = '';
        }

        $purchase_link = '';
        $code = get_field('rezdy_product_code', (int)$atts['product_id']);
        if ( !empty($code) ) {
            $purchase_link = get_permalink( DRIVEME_PURCHASE_PAGE_ID ) . '?pid=' . $code;
        }

        $carname = get_field('carname', (int)$atts['product_id']);

        $this->includeWithVariables( DRIVEME_PURCHASE_PLUGIN_TEMPLATE_DIR . 'book-item.php', compact('carname', 'price', 'purchase_link' ));
    }


    public function getProductPost(): ?WP_Post
    {
        //Buscar el post cuyo "rezdy_product_code" es $_GET['pid']
        //@see: https://www.advancedcustomfields.com/resources/query-posts-custom-fields/
        $args = [
            'numberposts' => 1,
            'post_type' => 'product',
            'meta_key' => 'rezdy_product_code',
            'meta_value' => $this->getProductCode()
        ];
        $query = new \WP_Query($args);
        $posts = $query->get_posts();
        if (!empty($posts)) {
            return $posts[0];
        }

        return null;
    }

    public function getProductCode(): ?string
    {
        return $_GET['pid'] ?? null;
    }

    public function getHeaderImage(): ?string
    {
        $thumbnail = get_the_post_thumbnail_url($this->getProductPost(), 'full');
        return $thumbnail ? $thumbnail : 'http://lorempixel.com/output/city-q-c-1200-600-1.jpg';
    }

    public function getProductTitle(): ?string
    {
        return get_the_title($this->getProductPost());
    }

    public function getProductSubtitle(): ?string
    {
        return get_field('subtitle', $this->getProductPost()) ?? 'Product subtitle';
    }

    public function getProductPrice(): float
    {
        return get_field('price', $this->getProductPost()) ?? 0.0;
    }

    public function getProductBookingType(): string
    {
        return get_field('booking_type', $this->getProductPost()) ?? BOOKING_TYPE_DEFAULT;
    }

    private function includeWithVariables($filePath, $variables = array(), $print = true)
    {
        $output = NULL;
        if(file_exists($filePath)){

            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;

    }

}
