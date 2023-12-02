/* eslint-disable camelcase */
/* eslint-disable no-unused-vars */
function calculate () {
  const luas_ukur = document.getElementById('luas_ukur').value
  const luas_permohonan = document.getElementById('luas_permohonan').value
  const result = Math.abs(parseInt(luas_ukur) - parseInt(luas_permohonan)) / parseInt(luas_ukur)
  const view = (result * 100).toFixed(2) + '%'
  document.getElementById('beda_luas').value = view
}
function age () {
  const tanggal_lahir = new Date(document.getElementById('Tanggal_Lahir').value)
  const date_dif = Date.now() - tanggal_lahir.getTime()
  const ageDate = new Date(date_dif)
  const view = Math.abs(ageDate.getUTCFullYear() - 1970)
  document.getElementById('Usia').value = view
}
function an_age () {
  const tanggal_lahir = new Date(document.getElementById('An_Tanggal_Lahir').value)
  const date_dif = Date.now() - tanggal_lahir.getTime()
  const ageDate = new Date(date_dif)
  let view = Math.abs(ageDate.getUTCFullYear() - 1970)
  if (view < 0) {
    view = 0
  }
  document.getElementById('An_Usia').value = view
}
