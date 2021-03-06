const banneds = document.querySelector('#banneds')
const modals = document.querySelector('#modals')
let currentPage = 0
let currentTotal = 10

const selectBanneds = async type => {
	let bannedsHTML = '',
		modalsHTML = ''

	if (currentTotal < 10 && type === 0) currentPage--
	else if (type === 0 && currentPage > 1) currentPage--
	else if (currentTotal === 10 && type === 1) currentPage++
	else return

	const data = await (await fetch(`src/select_banneds.php?page=${currentPage}`)).json()

	currentTotal = Object.keys(data).length

	for (const i in data) {
		modalsHTML += (
			`<div id="removeBanned${i}" class="modal">
				<div class="modal-content left-div-margin">
					<h4 class="flow-text" style="font-size:30px;margin:-5px 0 15px"><i class="material-icons left" style="top:7px">comment</i>Remover Banimento</h4>
					<div class="divider"></div>
					<p class="mb-0">Você tem certeza que deseja desbanir ${i}?</p>

					<div class="left-div dark-grey" style="border-radius:0"></div>
				</div>

				<div class="divider"></div>

				<div class="modal-footer">
					<button title="Cancelar" class="modal-close btn waves-effect waves-light dark-grey z-depth-0"><i class="material-icons left">close</i>Cancelar</button>
					<a onclick="deleteBanned(${i})" title="Remover Banimento" class="modal-close btn waves-effect waves-light red-color z-depth-0"><i class="material-icons left">delete</i>Remover</a>
				</div>
			</div>`
		)

		bannedsHTML += (
			`<tr>
				<td>${i}</td>
				<td>${data[i][0]}</td>
				<td>${data[i][1]}</td>
				<td>
					<button class="btn waves-effect waves-light red-color z-depth-0 modal-trigger" style="cursor:pointer" title="Remover Banimento" data-target="removeBanned${i}"><i class="material-icons">delete</i></button>
				</td>
			</tr>`
		)
	}

	banneds.innerHTML = bannedsHTML
	modals.innerHTML = modalsHTML
	M.Modal.init(document.querySelectorAll('.modal'))
}

const deleteBanned = async ip => {
	const data = await (await fetch(`src/delete_banned.php?banned_ip=${ip}`)).json()

	if (data.status === '1') {
		M.toast({
			html: `O IP: ${ip} foi desbanido.`,
			classes: 'green'
		})

		selectBanneds()
	} else {
		M.toast({
			html: `Não foi possível desbanir o IP: ${ip}.`,
			classes: 'red accent-4'
		})
	}
}

selectBanneds(1)
