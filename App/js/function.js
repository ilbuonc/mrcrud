/* ********************************************************************** 
MRCRUD - My Rude Create Read Update Delete
Copyright (C) 2017  Giuseppe Dario Camiolo

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
********************************************************************** */

/*General Functions*/
function setSelect(select, val){

$(select+' option').each(
function()
{
//alert($(this).val());
if($(this).val() === val){
	$(this).attr('selected',true);
}else{
	$(this).attr('selected',false);
} 

}
);

}
function clearForm(ref)
{
$('form[name='+ref+'] :input') .not(':button, :submit, :reset, :hidden') .val('') .removeAttr('checked') .removeAttr('selected');
//$('form[name='+ref+'] input[name=value]').val('new');
}
function rybot()
{
var input = '<input class="form-control" type="email" name="rybot" id="Remail" placeholder="Please confirm your EMAIL" required/>';
$('p#rybot').html(input);
var inputRP = '<input class="form-control" type="email" name="rybot" id="RPemail" placeholder="Please confirm your EMAIL" required/>';
$('p#rybotRP').html(inputRP);

}
function validateMyData(mydata){
 var r = '0';
 mydata.forEach(function(e){
		if(e.value === '' || e.value ===  ' '){
			alert(e.name+': please insert a valid entry!'); 
			r--;
		}else{
			r++;
		}
	});
 return r;
}
function addRow(mypostdata,msg){

$.ajax({
type: 'POST',
url: 'action/addRow.php', 
data: mypostdata,
success: function(json)
{
 alert(msg);
 document.location.reload(true);
},
error: function(request, state, error)
{
	alert(request+' '+state+' '+error);
}

});

}
function updRow(mypostdata,msg){

$.ajax({
type: 'POST',
url: 'action/updRow.php', 
data: mypostdata,
success: function(json)
{
 alert(msg);
 document.location.reload(true);
},
error: function(request, state, error)
{
	alert(request+' '+state+' '+error);
}

});

}
