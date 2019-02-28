// Materialize initalizations
M.Sidenav.init(document.querySelectorAll('.sidenav'))
M.Collapsible.init(document.querySelectorAll('.collapsible'), {
  accordion: false
})

// Left and right effects from sidebar
const sidenav = M.Sidenav.getInstance(document.querySelector('#slide-out'))
let tr = false

if (sessionStorage.getItem('sideStatus') === 'true') {
  sidenav.options.outDuration = 0
  sideOut()
  animateOut(0)
}

function animateIn(delay = 200) {
  document.body.animate([{
      paddingLeft: '0',
    },
    {
      paddingLeft: '300px',
    }
  ], {
    duration: delay,
    fill: 'forwards'
  })
}

function animateOut(delay = 150) {
  document.body.animate([{
      paddingLeft: '300px',
    },
    {
      paddingLeft: '0',
    }
  ], {
    duration: delay,
    fill: 'forwards'
  })
}

function sideIn() {
  sidenav._animateSidenavIn()
  tr = false
  sidenav.isOpen = true
}

function sideOut() {
  sidenav._animateSidenavOut()
  tr = true
  sidenav.isClose = true
}

document.querySelector('#menu').onclick = function () {
  if (innerWidth >= 993) {
    if (tr) {
      sidenav.options.outDuration = 150
      sideIn()
      animateIn()
      sessionStorage.removeItem('sideStatus')
    } else {
      sideOut()
      animateOut()
      sessionStorage.setItem('sideStatus', true)
    }
  } else if (sidenav.options.outDuration === 0)
    sidenav.options.outDuration = 200
}

// Media Queries with pure JS
const maxWidth = window.matchMedia('(max-width: 992px)')
const minWidth = window.matchMedia('(min-width: 993px)')

function matchMax(maxWidth) {
  if (maxWidth.matches && !tr)
    animateOut()
  else if (maxWidth.matches && tr)
    sidenav.options.outDuration = 0
}

function matchMin(minWidth) {
  if (minWidth.matches) {
    sessionStorage.removeItem('sideStatus')
    animateIn(0)
    tr = false
  }
}

window.onload = function () {
  maxWidth.addListener(matchMax)
  minWidth.addListener(matchMin)

  document.body.style.display = 'flex'
}