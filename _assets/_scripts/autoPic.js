
function inputBtn(){

	var pNode = document.createElement("P");
    var input=document.createElement('input');
    input.type="file";
    input.name="file_array[]";
    input.setAttribute("class", "spacer")
    pNode.appendChild(input);

    $form = document.getElementById("formCenter");
    $form.appendChild(pNode);

}