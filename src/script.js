var shown = false;
var register = false;
var apple;
var points = [];
var pointTab = [];
var pointTabFb = [];
var labelsTab = [];
var amazon;
var amazonTab = [];
var google;
var googleTab = [];
var microsoft;
var microsoftTab = [];

facebook = getData('fb');
apple = getData('aapl');
amazon = getData('amzn');
google = getData('googl');
microsoft = getData('msft');

function getData(symbol){
	var xhReq = new XMLHttpRequest();
	xhReq.open("GET", 'https://api.iextrading.com/1.0/stock/'+symbol+'/batch?types=quote,news,chart&range=1d&last=1', false);
	xhReq.send(null);
	return JSON.parse(xhReq.responseText);
}

function getCompanyData(symbol){
	var xhReq = new XMLHttpRequest();
	xhReq.open("GET", 'https://api.iextrading.com/1.0/stock/'+symbol+'/company', false);
	xhReq.send(null);
	return JSON.parse(xhReq.responseText);
}

var appleInfo = getCompanyData("aapl");
var amazonInfo = getCompanyData("amzn");

/*fillTab("aapl", 4);*/
fillAll();
/*
xhReq.open("GET", 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=^FCHI&apikey=N2KF23VHJL04HIEI', false);
xhReq.send(null);
var cac = JSON.parse(xhReq.responseText);
*/
for(var i = 0; i < apple["chart"].length; i++){
    points[apple["chart"][i].minute] = apple["chart"][i].open;
    pointTab[i] = apple["chart"][i].open;
    labelsTab[i] = apple["chart"][i].minute;
    pointTabFb[i] = facebook["chart"][i].open;
    amazonTab[i] = amazon["chart"][i].open;
    googleTab[i] = google["chart"][i].open;
    microsoftTab[i] = microsoft["chart"][i].open;
  }
 /*
  var key0 = Object.keys(cac);
  var key1 = Object.keys(cac[key0[1]]);
  var i = 0;
  for(var j = 0; j < key1.length; j++){
  	cacTab[j] = cac[key0[1]][key1[j]]["1. open"];
  	cacPoints[j] = key1[j];
  }
*/
  var ctx = document.getElementById("myChart").getContext("2d");

  // Instantiate a new chart using 'data' (defined below)
  var speedData = {
    labels: labelsTab,
    datasets: [
    {
      label: "Apple",
      data: pointTab,
      fill: false,
      borderColor: "grey"
    },{
      label: "Facebook",
      data: pointTabFb,
      fill: false,
      borderColor: "blue"
    },{
      label: "Amazon",
      data: amazonTab,
      fill: false,
      borderColor: "orange",
			hidden: true
    },{
      label: "Google",
      data: googleTab,
      fill: false,
      borderColor: "red",
			hidden: true
    },{
      label: "Microsoft",
      data: microsoftTab,
      fill: false,
      borderColor: "green",
			hidden: true
    }
    ]
  };

  var chartOptions = {
		responsive: true,
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    },
    elements: { point: { radius: 2 } },
    scales: {
        xAxes: [{
            gridLines: {
                display:true
            }
        }],
        yAxes: [{
            gridLines: {
                display:true
            }
        }]
    }
  };

  var lineChart = new Chart(ctx, {
    type: 'line',
    data: speedData,
    options: chartOptions
  });


function showDiv() {
	if(shown == false){
		document.getElementById('loginField').style.visibility = 'visible';
		//document.getElementById('loginField').style.display = "inline-block";
   		document.getElementById('loginField').style.opacity = "100";
   		shown = true;
   	}else if(shown==true){
   		document.getElementById('loginField').style.visibility = "hidden";
   		document.getElementById('loginField').style.opacity = "0";
   		shown = false;
   	}

}

function displayAll(){
	var nameField=document.getElementById('identity');
	var mailField=document.getElementById('mail');
	var mobileField=document.getElementById('mobile');
	if(!shown){
		nameField.style.visibility = "visible";
		nameField.style.opacity = "100";
		mailField.style.visibility = "visible";
		mailField.style.opacity = "100";
		mobileField.style.visibility = "visible";
		mobileField.style.opacity = "100";
		shown=true;
	}else if(shown){
		nameField.style.opacity = "0";
		nameField.style.visibility = "hidden";
		mailField.style.opacity = "0";
		mailField.style.visibility = "hidden";
		mobileField.style.opacity = "0";
		mobileField.style.visibility = "hidden";
		shown=false;
	}

}

function fillAll(){
	var companies = ["googl", "amzn", "fb", "aapl", "msft"];
	for(var i = 0 ; i < companies.length; i++){
		fillTab(companies[i], i+1);
	}
}

function fillTab(symbol, index){
	var keys = ["symbol", "companyName", "CEO", "industry", "website", "description"];
	var infoTab = getCompanyData(symbol);
	for(var i = 1; i < 7; i++){
		var info = infoTab[keys[i-1]];
		var placement = document.getElementsByTagName("tr")[i].getElementsByTagName("td")[index];
		if(keys[i-1] == "website"){
			info = "<a href='"+info+"'>"+info+"</a>"
		}
		placement.innerHTML = info;
	}
}

/* ===== Reactiv elements of the page ===== */
function askConfirm(){
  if(!register){
    var myDiv = document.getElementById('confirm');
    myDiv.style.display = "inline-block";
    register = true;
    document.getElementById("registerButton").setAttribute("type", "submit");
    document.getElementsByName("pwdConfirm").required = true;
  }
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
