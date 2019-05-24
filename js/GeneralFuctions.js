$(document).ready(function() {
  // Javascript method's body can be found in assets/js/demos.js
  md.initDashboardPageCharts();
  var uri = window.location.toString();
  if (uri.indexOf("?") > 0) {
      var clean_uri = uri.substring(0, uri.indexOf("?"));
      window.history.replaceState({}, document.title, clean_uri);
  }
});

function exit() {
  window.location.href ='logout.php';   var slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>
}
