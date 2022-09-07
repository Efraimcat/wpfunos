// variables globales
const today = new Date()
const tomorrow = new Date(today)
tomorrow.setDate(tomorrow.getDate() + 3)

// iniciar el script luego de que la página haya cargado
document.addEventListener("readystatechange", (event) => {
  if (event.target.readyState === "complete") {
    initApp()
  }
})

// urls para omitir que los bótones CTA aparezcan
const URLS = [
	"comparar-precios",

]

// urls para omitir que el formulario aparezca
const formURLS = [
	"comparar-precios",
	"contacto",
	"dejanos-tus-datos"
]

// función que inicia el scrit
function initApp() {
	checkStaticFormUrl()
	setTimeout(() => {
		setButtons()
		if(checkFormUrl()) {
			addForm()
			//closeForm()
		}
	},4000)
}

// verificar que la url no esté en la lista de omición del formulario
function checkFormUrl() {
	let formDate = localStorage.getItem('formDate')
	if (!formDate) {
		localStorage.setItem('formDate', today)
		formDate = localStorage.getItem('formDate')
	}

	if(formDate <= today) {
		localStorage.setItem('closedForm', false)
	}

	if(localStorage.getItem('closedForm') == 'true') {
		return false
	}

	const url = window.location.href
	const newURL = url.split("/").pop()
	if (formURLS.includes(newURL) || url.includes('comparar-precios') || url.includes('dejanos-tus-datos')) {
		return false
	}
	return true
}

// verificar que la url no esté en la lista de omición del formulario
function checkStaticFormUrl() {
	const url = window.location.href
	if(url.includes('dejanos-tus-datos')) {
		const btn = document.getElementById('wpforms-submit-47113')
		const params = new URLSearchParams(window.location.search)
		if(params.get('verificar') === 'on') {
			document.getElementById('wpforms-47113-field_5_1').checked = true
			btn.click()
		}
	}
}

// función que añade el html d elos botones cta
function setButtons() {
	document.getElementsByTagName("footer")[0].innerHTML += `
		<div id="wpfunos-btns-wrapper">
			<a href="tel:937828200" id="wpfunos-btn-llamar" class="wpfunos-btn-cta">
				<img src="https://funos.es/wp-content/uploads/2022/04/llamar-icono.png" />
			<a/>
			<a id="wpfunos-btn-whatsapp" class="wpfunos-btn-cta" href="https://wa.me/message/TTW45ZJEQWZGK1">
				<img src="https://funos.es/wp-content/uploads/2022/04/icono-whatsapp.png">
			</a>
		</div>
	`
}

// función para cerrar el formulario
function closeForm() {
	const closeBtn = document.getElementById('wpfunos-close-form')
	const formWrapper = document.getElementById('wpfunos-fixed-form-wrapper')
	closeBtn.addEventListener("click", () => {
		localStorage.setItem('closedForm', true)
		localStorage.setItem('formDate', tomorrow)
		formWrapper.style.display = "none"
	})
}

// función para añadir el html del formulario
function addForm() {

}

/*
function setCompareButton() {
	document.getElementById("wpfunos-btns-wrapper").innerHTML += `
		<div id="wp-funos-btn-comparar-wrapper">
			<span>Comparar precios</span>
			<a href="https://funos.es/comparar-precios" id="wpfunos-btn-comparar" class="wpfunos-btn-cta">
				<img src="https://funos.es/wp-content/uploads/2022/04/icono-lupa-blanca.png">
			</a>
		</div>
	`
}
*/

// verificar que la url no esté en la lista de omición de los botones cta
function checkUrl() {
	const url = window.location.href
	const newURL = url.split("/").pop()
	if (URLS.includes(newURL) || url.includes('comparar-precios')) {
		return false
	}
	return true
}
