const digit = document.querySelector('#digit')
const key = document.querySelector('#key')
const loc = document.querySelector('#location')
const which = document.querySelector('#which')
const code = document.querySelector('#code')

window.onkeydown = e => {
	e.preventDefault()
	digit.textContent = e.which
	key.textContent = e.key
	loc.textContent = `${e.location} (${getKeyCode(e.location)})`
	which.textContent = e.which
	code.textContent = e.code
}
