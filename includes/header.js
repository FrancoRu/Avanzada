$(document).ready(function () {
  $('.navbar-toggler').click(function () {
    $('.navbar-collapse').toggleClass('show')
    $('.navbar-nav').toggleClass('custom-ul')
  })
})

document.addEventListener('DOMContentLoaded', function () {
  var toggleGifsButton = document.getElementById('amiguitosGifs')
  var gifsPerrones = document.getElementById('gifs-perrones')

  var confettiElement = document.getElementById('amiguesBoton')
  var confettiSettings = { target: confettiElement }
  var confetti = new ConfettiGenerator(confettiSettings)

  amiguesBoton.addEventListener('click', function () {
    if (gifsPerrones.style.display === 'none') {
      gifsPerrones.style.display = 'block' // Mostrar el div
      confetti.render()
    } else {
      gifsPerrones.style.display = 'none' // Ocultar el div
    }
  })
})
