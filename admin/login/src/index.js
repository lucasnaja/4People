const txtPassword = document.querySelector('input[name=admin_password]')
const txtPasswordIcon = document.querySelector('#visibility')
const form = document.querySelector('form')
const btnSubmit = form.querySelector('button')
const lblBannedStatus = document.querySelector('#bannedStatus')

form.onsubmit = async e => {
	e.preventDefault()
	btnSubmit.disabled = true

	const result = await (await fetch('src/login.php', {
		method: 'POST',
		body: new FormData(form)
	})).json()

	if (result.status === '1') location = '../painel_administrativo/'
	else {
		M.toast({
			html: result.reason === 'wrong' ? 'Login e/ou senha inexistente.' : 'Você está banido temporariamente.',
			classes: 'red accent-4'
		})

		txtPassword.value = ''
		txtPassword.classList.remove('valid')
		checkBannedStatus()
	}

	btnSubmit.disabled = false
}

const checkBannedStatus = async () => {
	const data = await (await fetch('src/check_banned_status.php')).json()

	if (data.banned_status === '1') {
		if (parseInt(data.banned_amount) > 3) {
			lblBannedStatus.className = 'btn-flat mt-2 red-text btn-flat-hover'
			lblBannedStatus.innerHTML = `Você foi bloqueado de logar por: ${data.banned_time}`
		} else {
			lblBannedStatus.className = 'btn-flat mt-2 btn-flat-hover'
			lblBannedStatus.innerHTML = `Número de tentativas falhas: ${data.banned_amount}/3`
		}
	} else lblBannedStatus.className = 'hide'
}

const switchVisibility = () => {
	if (txtPassword.type === 'password') {
		txtPassword.type = 'text'
		txtPasswordIcon.innerText = 'visibility_off'
	} else {
		txtPassword.type = 'password'
		txtPasswordIcon.innerText = 'remove_red_eye'
	}
}

checkBannedStatus()
