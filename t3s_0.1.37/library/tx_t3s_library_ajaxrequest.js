var request = null;
var ajaxtasksIncrement = 0;
var ajaxtasks = new Array();
var localconfExtensions="";
var terImportArray  = new Array();
var terImportExtList = true;
function setTerImportTasks(){
   terImportArray = document.getElementById('t3sTerimport').value.split(',');
   for (var i in terImportArray){
     var str = terImportArray[i].toString();
     str = str.replace(/^\s+|\s+$/g,"");
     if(str.length){
       if(i==0){
          	 ajaxtasks.push('t3sTerimport='+str);
   	         localconfExtensions = str;
       }else{
          	 ajaxtasks.push('t3sTerimport='+str);
   	         localconfExtensions = localconfExtensions + ','+str;
       }
     }
   }
}
function setAjaxTasks(){
  setTerImportTasks();
  if(document.getElementById('t3sHtaccess').checked){
    ajaxtasks.push('t3sHtaccess=true');
  }
  if(document.getElementById('t3sWriteFileadmin').checked){
    ajaxtasks.push('t3sWriteFileadmin=true');
  }
  ajaxtasks.push('t3sWriteTypo3Temp=true');
  ajaxtasks.push('t3sWriteTypo3Upload=true');
  ajaxtasks.push('t3sWriteTypo3Conf=true');
  ajaxtasks.push('t3sT3XFiles=true');
  ajaxtasks.push('t3sForceDBupdates='+localconfExtensions);
  if(document.getElementById('t3sSql').checked){
    ajaxtasks.push('t3sSql=true&t3sCExt=t3s'+document.getElementById('t3sCreateExtension').value);
  }
  if(document.getElementById('t3sCreateExtension').value.length){
  	ajaxtasks.push('t3sCreateExtension='+document.getElementById('t3sCreateExtension').value);
  }
  ajaxtasks.push('t3sWriteLocalconf=');
  ajaxtasks.push('t3sUnableInstallTool=true');
}
function setStatusStart(){
  document.getElementById('statusSpinner').innerHTML = "<img src='spinner.gif'>";
  document.getElementById('statusWarning').innerHTML = "<div style='font-weight: bold; color: red; font-size: medium; width: 1000px;'>Please wait! <br>It could cause problems if you stop the installation!</div>";
}
function setStatusEnd(){
  document.getElementById('statusSpinner').innerHTML = "";
  document.getElementById('statusWarning').innerHTML = "<div style='font-weight: bold;  color: black; font-size: medium; width: 1000px;'>T3S installed! <br>Please clear all caches and reload the website!</div>";
}
function setStatusExit(){
  document.getElementById('statusSpinner').innerHTML = "";
  document.getElementById('statusWarning').innerHTML = "<div style='font-weight: bold;  color: black; font-size: medium; width: 1000px;'>T3S Not installed!</div>";
}
function sendAjax(){
  if(document.getElementById('t3sCreateExtension').value == ''){
    alert('Please set a name for your T3S-Distribution!');
    return false;
  }else{
	  document.getElementById('t3sform').style.display = "none";
	  setStatusStart();
	  setAjaxTasks();
	  setStatusBar();
	  sendTask();
	  return false;
  }
}
function sendTask(){
  task = ajaxtasks[ajaxtasksIncrement];
  if(task == 't3sWriteLocalconf='){
     if(terImportExtList){
     	task = 't3sWriteLocalconf='+localconfExtensions;
     	t3sCreateExtension = document.getElementById('t3sCreateExtension').value.replace(/^\s+|\s+$/g,"");
     	if(t3sCreateExtension.length){
     	   task = task+',t3s'+t3sCreateExtension+'&t3sCExt=t3s'+t3sCreateExtension;
        }
     }else{
     	task = 't3sWriteLocalconf=false';
     }
  }
  ajaxAction(task+'&t3ssetup='+document.getElementById('t3ssetup').value);
}
function ajaxAction(response)
{
	if (request != null && request.readyState != 0 && request.readyState != 4){
		request.abort();
	}

	try	{
		request = new XMLHttpRequest();
	}
	catch (error){
		try
		{
			request = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (error)
		{

			request = null;

			return false;
		}
	}

	request.onreadystatechange = ajaxEvent;
	request.open("POST", "index_ajax.php",true,"","");
	request.setRequestHeader('Content-Type',
                    'application/x-www-form-urlencoded; charset=UTF-8');


	request.send(response);
	return true;
 }
 function ajaxEvent(){
 	if (request.readyState == 4)
	{
		try
		{
			if (request.status == 200)
			{
			     var arrayResponse = request.responseText.split('||||');
			     var statusListText = arrayResponse[0].replace(/^\s+|\s+$/g,"");
			     var action = arrayResponse[1].replace(/^\s+|\s+$/g,"");
			     var requestKey = arrayResponse[2].replace(/^\s+|\s+$/g,"");
			     var requestValue = arrayResponse[3].replace(/^\s+|\s+$/g,"");
			     if(action != 'true' && requestKey=='t3sTerimport' || requestKey==''){
			         if(confirm("The Extension "+requestValue+" is NOT downloaded! Start new download!")){
			            ajaxtasksIncrement--;
			         	sendTask();
			         }else{
			         	terImportExtList = false;
			         	setStatusExit();
			         	return true;
			         }
			     }
                 setStatusList(statusListText);
                 ajaxtasksIncrement++;
                 setStatusBar();
                 if(ajaxtasksIncrement < ajaxtasks.length){
                    sendTask();
                 }else{
                    setStatusEnd();
                 }
			}
			else if (request.status != 0)
			{
                   return false;
			}
		}
		catch (error)
		{
		  return false;
		}
	}
	return true;
}

function setStatusList(value){
   var li  = document.createElement("li");
   li.innerHTML = value;
   document.getElementById('statusList').appendChild(li);
}
function setStatusBar(){
   nbsp = '&nbsp;&nbsp;&nbsp;';
   statusHTMLGreen = '<div style="display:inline; background: green; ">'+nbsp+'</div>';
   statusHTMLGray =  '<div style="display:inline; background: gray; ">'+nbsp+'</div>';
   statusHTML = '';
   i = 1;
   while(i<=ajaxtasks.length){
     if(i<=ajaxtasksIncrement){
        statusHTML = statusHTML + statusHTMLGreen;
     }else{
        statusHTML = statusHTML + statusHTMLGray;
     }
     i++;
   }
   text = ' Tasks ';
   document.getElementById('statusCount').innerHTML = statusHTML + nbsp + ajaxtasksIncrement + ' of ' + ajaxtasks.length + text;
}