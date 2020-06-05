/*
Auteur: Alexandre Cormier;
Matricule: 748947;
Code Permanent: CORA 2902 7602
Login: cormiea
*/
function envoyerFormulaire(leForm) {
  const selectedOption = document.getElementById("villes");
  const alert = document.getElementById("alert");
  if (selectedOption.options[selectedOption.selectedIndex] == null) {
    alert.style.display = "block";
  } else {
    leForm.submit();
    resetSelect();
  }
}

function resetSelect() {
  document.getElementById("villes").options.length = 0;
}
