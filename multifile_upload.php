<?  include $_SERVER["DOCUMENT_ROOT"]."/folder_name/file_name.php";
    include $_SERVER["DOCUMENT_ROOT"]."/folder_name/file_name.php";

	$board_no = preg_replace("/[^0-9]*/s", "", $_GET['no']);

	$u_email = $_SESSION["user_email"];
	$u_name = $_SESSION['user_name'];
	$sql = "SELECT * FROM table_name WHERE user_email = '$u_email'" ;
  	$view = sql_fetch($sql);
	$user_no = $view["user_no"];

	$board_sql = "SELECT * FROM table_name WHERE no = '$board_no'" ;
	$rows = sql_fetch($board_sql);
	$objective = $rows["objective"];
	$auth = $rows["auth"];
?>
<div class = "table_body">
  <table>
  	<div style = "height:50px;"></div>
  	<div class = "info_txt">첨부파일</div>
  	<div class = "ext_info">*첨부파일은 PDF/WORD(docx)/PPT만 가능합니다.</div>
  	<tr id = "portfolio_tr" style = "display:none;">
  		<th class = "attach"><span style = "color:red;">*</span>file1</th>
  		<td colspan = "3">
  			<input type="file" class = "add_files" name="fileToUpload" id="fileToUpload0" multiple="multiple" accept=".pdf, .ppt, .pptx, .docx" />
  		</td>
  		<td>
  			<p id="files_area0">
  				<span id="filesList0">
  					<span id="files_names0"></span>
  				</span>
  			</p>
  		</td>
  	</tr>
  	<tr id = "graduate_tr" style = "display:none;">
  		<th class = "attach"><span style = "color:red;">*</span>file2</th>
  		<td colspan = "3">
  			<input type="file" class = "add_files" name="fileToUpload" id="fileToUpload1" multiple="multiple" accept=".pdf, .ppt, .pptx, .docx" />
  		</td>
  		<td>
  			<p id="files_area1">
  				<span id="filesList1">
  					<span id="files_names1"></span>
  				</span>
  			</p>
  		</td>
  	</tr>
  	<tr id = "career_tr" style = "display:none;">
  		<th class = "attach"><span style = "color:red;">*</span>file3</th>
  		<td colspan = "3">
  			<input type="file" class = "add_files" name="fileToUpload" id="fileToUpload2" multiple="multiple" accept=".pdf, .ppt, .pptx, .docx" />
  		</td>
  		<td>
  			<p id="files_area2">
  				<span id="filesList2">
  					<span id="files_names2"></span>
  				</span>
  			</p>
  		</td>
  	</tr>
  
  	<tr id = "new_grade_tr" style = "display:none;">
  		<th class = "attach"><span style = "color:red;">*</span>file4</th>
  		<td colspan = "3">
  			<input type="file" class = "add_files" name="fileToUpload" id="fileToUpload3" multiple="multiple" accept=".pdf, .ppt, .pptx, .docx" />
  		</td>
  		<td>
  			<p id="files_area3">
  				<span id="filesList3">
  					<span id="files_names3"></span>
  				</span>
  			</p>
  		</td>
  	</tr>
  	<tr id = "new_eng_tr" style = "display:none;">
  		<th class = "attach">file5</th>
  		<td colspan = "3">
  			<input type="file" class = "add_files" name="fileToUpload" id="fileToUpload4" multiple="multiple" accept=".pdf, .ppt, .pptx, .docx" />
  		</td>
  		<td>
  			<p id="files_area4">
  				<span id="filesList4">
  					<span id="files_names4"></span>
  				</span>
  			</p>
  		</td>
  	</tr>
  </table>
  <div class = "go_btn">
  	<button type = "submit" class = "go_apply" onclick = "goSubmit();">제출하기</button>
  	<button type = "button" class = "go_list" onclick = "cancel_popup();">취소</button>
  </div>
</div>

<style>
	table {width:100%;}
	table, td, th {border-bottom:1px solid black; border-top:1px solid black; border-collapse:collapse;}
	tr{height:50px;}
	.table_body {width:75%; margin:auto;}
	.go_btn {text-align:center;}
	.go_apply {background-color:#01324b; color:white; width:15%; font-size:17px; font-weight:500; margin-top:30px; margin-bottom:50px;}
	.go_list {border:1px solid #01324b; color:#01324b; width:15%; font-size:17px; font-weight:500; margin-top:30px; margin-bottom:50px;}
	.info_txt{font-size:20px;font-weight:500; color:#01324b;}
	.attach {width:18%;}
	.ext_info {float:right; color:red;}
	.alert {font-size:15px;font-weight:400; color:red;}
	input[type=file]::file-selector-button {color:#01324b; width:30%; font-size:14px; font-weight:700; background: #fff; border: 1px solid #01324b;;}
	#files_area0{width: 30%; margin: 0 auto;}
	.file_block0{border-radius: 10px;background-color: rgba(144, 163, 203, 0.2);margin: 5px;color: initial;display: inline-flex; & > span.name{padding-right: 10px;width: max-content;display: inline-flex;}}
	.file_delete0{display: flex;width: 24px;color: initial;background-color: #6eb4ff00;font-size: large;justify-content: center;margin-right: 3px;cursor: pointer; &:hover{ background-color: rgba(144, 163, 203, 0.2);border-radius: 10px;} & > span{transform: rotate(45deg);}}
	#files_area1{width: 30%; margin: 0 auto;}
	.file_block1{border-radius: 10px;background-color: rgba(144, 163, 203, 0.2);margin: 5px;color: initial;display: inline-flex; & > span.name{padding-right: 10px;width: max-content;display: inline-flex;}}
	.file_delete1{display: flex;width: 24px;color: initial;background-color: #6eb4ff00;font-size: large;justify-content: center;margin-right: 3px;cursor: pointer; &:hover{ background-color: rgba(144, 163, 203, 0.2);border-radius: 10px;} & > span{transform: rotate(45deg);}}
	#files_area2{width: 30%; margin: 0 auto;}
	.file_block2{border-radius: 10px;background-color: rgba(144, 163, 203, 0.2);margin: 5px;color: initial;display: inline-flex; & > span.name{padding-right: 10px;width: max-content;display: inline-flex;}}
	.file_delete2{display: flex;width: 24px;color: initial;background-color: #6eb4ff00;font-size: large;justify-content: center;margin-right: 3px;cursor: pointer; &:hover{ background-color: rgba(144, 163, 203, 0.2);border-radius: 10px;} & > span{transform: rotate(45deg);}}
	#files_area3{width: 30%; margin: 0 auto;}
	.file_block3{border-radius: 10px;background-color: rgba(144, 163, 203, 0.2);margin: 5px;color: initial;display: inline-flex; & > span.name{padding-right: 10px;width: max-content;display: inline-flex;}}
	.file_delete3{display: flex;width: 24px;color: initial;background-color: #6eb4ff00;font-size: large;justify-content: center;margin-right: 3px;cursor: pointer; &:hover{ background-color: rgba(144, 163, 203, 0.2);border-radius: 10px;} & > span{transform: rotate(45deg);}}
	#files_area4{width: 30%; margin: 0 auto;}
	.file_block4{border-radius: 10px;background-color: rgba(144, 163, 203, 0.2);margin: 5px;color: initial;display: inline-flex; & > span.name{padding-right: 10px;width: max-content;display: inline-flex;}}
	.file_delete4{display: flex;width: 24px;color: initial;background-color: #6eb4ff00;font-size: large;justify-content: center;margin-right: 3px;cursor: pointer; &:hover{ background-color: rgba(144, 163, 203, 0.2);border-radius: 10px;} & > span{transform: rotate(45deg);}}
</style>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
$('#tel').keydown(function(event) { //etc.핸드폰번호 자동 '-'입력
	var key = event.charCode || event.keyCode || 0;
	$text = $(this);
	if (key !== 8 && key !== 9) {
		if ($text.val().length === 3) {
			$text.val($text.val() + '-');
		}
		if ($text.val().length === 8) {
			$text.val($text.val() + '-');
		}
	}
	return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));          
});

function divisionChange(obj){ //etc. select option에 따라 display css값 변경
	if(obj.value == "신입"){
		document.getElementById("portfolio_tr").style.display="revert";
		document.getElementById("graduate_tr").style.display="revert";
		document.getElementById("career_tr").style.display="none";
		document.getElementById("experienced_tr").style.display="none";
		document.getElementById("new_grade_tr").style.display="revert";
		document.getElementById("new_eng_tr").style.display="revert";
	}else { //경력
		document.getElementById("portfolio_tr").style.display="revert";
		document.getElementById("graduate_tr").style.display="revert";
		document.getElementById("career_tr").style.display="revert";
		document.getElementById("experienced_tr").style.display="revert";
		document.getElementById("new_grade_tr").style.display="none";
		document.getElementById("new_eng_tr").style.display="revert";
	}
}
const dt0 = new DataTransfer();
$("#fileToUpload0").on('change', function(e){
	var maxsize = 10*1024*1024;
	var filesize = this.files[0].size;
	if(filesize > maxsize){
		this.value = "";
		alert('파일사이즈는 10MB 이하여야합니다.');
		return;
	}
	for(var i = 0; i < this.files.length; i++){
		var fileNm = this.files.item(i).name;
		var ext = fileNm.slice(fileNm.lastIndexOf(".")+1).toLowerCase();
		if(ext != 'pdf' && ext != 'docx' && ext != 'ppt' && ext != 'pptx'){
			this.value = "";
			alert('pdf, docx, ppt, pptx 파일만 등록이 가능합니다.');
			return;
		}
		let fileBloc = $('<span/>', {class: 'file_block0'}),
			fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file_delete0"><span>+</span></span>')
			.append(fileName);
		$("#filesList0 > #files_names0").append(fileBloc);
	};
	for (let file of this.files) {
		dt0.items.add(file);
	}
	this.files = dt0.files;

	$('span.file_delete0').click(function(){
		let name = $(this).next('span.name').text();
		$(this).parent().remove();
		for(let i = 0; i < dt0.items.length; i++){
			if(name === dt0.items[i].getAsFile().name){
				dt0.items.remove(i);
				continue;
			}
		}
		document.getElementById('fileToUpload0').files = dt0.files;
	});
});

const dt1 = new DataTransfer();
$("#fileToUpload1").on('change', function(e){
	var maxsize = 10*1024*1024;
	var filesize = this.files[0].size;
	if(filesize > maxsize){
		this.value = "";
		alert('파일사이즈는 10MB 이하여야합니다.');
		return;
	}
	for(var i = 0; i < this.files.length; i++){
		var fileNm = this.files.item(i).name;
		var ext = fileNm.slice(fileNm.lastIndexOf(".")+1).toLowerCase();
		if(ext != 'pdf' && ext != 'docx' && ext != 'ppt' && ext != 'pptx'){
			this.value = "";
			alert('pdf, docx, ppt, pptx 파일만 등록이 가능합니다.');
			return;
		}
		let fileBloc = $('<span/>', {class: 'file_block1'}),
			fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file_delete1"><span>+</span></span>')
			.append(fileName);
		$("#filesList1 > #files_names1").append(fileBloc);
	};
	for (let file of this.files) {
		dt1.items.add(file);
	}
	this.files = dt1.files;

	$('span.file_delete1').click(function(){
		let name = $(this).next('span.name').text();
		$(this).parent().remove();
		for(let i = 0; i < dt1.items.length; i++){
			if(name === dt1.items[i].getAsFile().name){
				dt1.items.remove(i);
				continue;
			}
		}
		document.getElementById('fileToUpload1').files = dt1.files;
	});
});

const dt2 = new DataTransfer();
$("#fileToUpload2").on('change', function(e){
	var maxsize = 10*1024*1024;
	var filesize = this.files[0].size;
	if(filesize > maxsize){
		this.value = "";
		alert('파일사이즈는 10MB 이하여야합니다.');
		return;
	}
	for(var i = 0; i < this.files.length; i++){
		var fileNm = this.files.item(i).name;
		var ext = fileNm.slice(fileNm.lastIndexOf(".")+1).toLowerCase();
		if(ext != 'pdf' && ext != 'docx' && ext != 'ppt' && ext != 'pptx'){
			this.value = "";
			alert('pdf, docx, ppt, pptx 파일만 등록이 가능합니다.');
			return;
		}
		let fileBloc = $('<span/>', {class: 'file_block2'}),
			fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file_delete2"><span>+</span></span>')
			.append(fileName);
		$("#filesList2 > #files_names2").append(fileBloc);
	};
	for (let file of this.files) {
		dt2.items.add(file);
	}
	this.files = dt2.files;

	$('span.file_delete2').click(function(){
		let name = $(this).next('span.name').text();
		$(this).parent().remove();
		for(let i = 0; i < dt2.items.length; i++){
			if(name === dt2.items[i].getAsFile().name){
				dt2.items.remove(i);
				continue;
			}
		}
		document.getElementById('fileToUpload2').files = dt2.files;
	});
});

const dt3 = new DataTransfer();
$("#fileToUpload3").on('change', function(e){
	var maxsize = 10*1024*1024;
	var filesize = this.files[0].size;
	if(filesize > maxsize){
		this.value = "";
		alert('파일사이즈는 10MB 이하여야합니다.');
		return;
	}
	for(var i = 0; i < this.files.length; i++){
		var fileNm = this.files.item(i).name;
		var ext = fileNm.slice(fileNm.lastIndexOf(".")+1).toLowerCase();
		if(ext != 'pdf' && ext != 'docx' && ext != 'ppt' && ext != 'pptx'){
			this.value = "";
			alert('pdf, docx, ppt, pptx 파일만 등록이 가능합니다.');
			return;
		}
		let fileBloc = $('<span/>', {class: 'file_block3'}),
			fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file_delete3"><span>+</span></span>')
			.append(fileName);
		$("#filesList3 > #files_names3").append(fileBloc);
	};
	for (let file of this.files) {
		dt3.items.add(file);
	}
	this.files = dt3.files;

	$('span.file_delete3').click(function(){
		let name = $(this).next('span.name').text();
		$(this).parent().remove();
		for(let i = 0; i < dt3.items.length; i++){
			if(name === dt3.items[i].getAsFile().name){
				dt3.items.remove(i);
				continue;
			}
		}
		document.getElementById('fileToUpload3').files = dt3.files;
	});
});

const dt4 = new DataTransfer();
$("#fileToUpload4").on('change', function(e){
	var maxsize = 10*1024*1024;
	var filesize = this.files[0].size;
	if(filesize > maxsize){
		this.value = "";
		alert('파일사이즈는 10MB 이하여야합니다.');
		return;
	}
	for(var i = 0; i < this.files.length; i++){
		var fileNm = this.files.item(i).name;
		var ext = fileNm.slice(fileNm.lastIndexOf(".")+1).toLowerCase();
		if(ext != 'pdf' && ext != 'docx' && ext != 'ppt' && ext != 'pptx'){
			this.value = "";
			alert('pdf, docx, ppt, pptx 파일만 등록이 가능합니다.');
			return;
		}
		let fileBloc = $('<span/>', {class: 'file_block4'}),
			fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file_delete4"><span>+</span></span>')
			.append(fileName);
		$("#filesList4 > #files_names4").append(fileBloc);
	};
	for (let file of this.files) {
		dt4.items.add(file);
	}
	this.files = dt4.files;

	$('span.file_delete4').click(function(){
		let name = $(this).next('span.name').text();
		$(this).parent().remove();
		for(let i = 0; i < dt4.items.length; i++){
			if(name === dt4.items[i].getAsFile().name){
				dt4.items.remove(i);
				continue;
			}
		}
		document.getElementById('fileToUpload4').files = dt4.files;
	});
});

function cancel_popup(){
	var result = confirm("페이지를 이동하면 작성한 내용이 사라집니다. 이 페이지에서 벗어나시겠습니까?");
	if(result ==true){
		location.href = "/recruit/job_board_detail.php?no=<?=$board_no?>";
	} 
}


function goSubmit() {
	var fnc = "recruit_submit";
	var user_no = "<? echo $user_no ?>";
	var name = $("input[name='name']").val(); //이름 이외 컬럼들 생략
	var portfolio_id = document.getElementById("fileToUpload0").value;
	var graduate_id = document.getElementById("fileToUpload1").value;
	var career_id = document.getElementById("fileToUpload2").value;
	var new_grade_id = document.getElementById("fileToUpload3").value;
	var fileInput0 = document.getElementById("fileToUpload0");
	var fileInput1 = document.getElementById("fileToUpload1");
	var fileInput2 = document.getElementById("fileToUpload2");
	var fileInput3 = document.getElementById("fileToUpload3");
	var fileInput4 = document.getElementById("fileToUpload4");
	var filesLength0 = fileInput0.files.length;
	var filesLength1 = fileInput1.files.length;
	var filesLength2 = fileInput2.files.length;
	var filesLength3 = fileInput3.files.length;
	var filesLength4 = fileInput4.files.length;
	var formData = new FormData();
	var size = 0;
	var file_path;
	var mailfnc = "recruit_confirm_email";
	var auth = "<?= $auth ?>";
	
	if(email == ""){ //etc. 메일 형식 확인
		alert("이메일을 입력해주세요.");
		$("input[name='email']").focus();
		return;
	}else{
		var exptext = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
		if(exptext.test(email)==false){
		alert("이메일형식이 올바르지 않습니다.");
		$("input[name='email']").focus();
		return false;
		}
	}
	
	for(var i = 0; i < filesLength0; i++){
		var file = fileInput0.files[i];
		formData.append('fileToUpload[]', file);
	}
	
	for(var i = 0; i < filesLength1; i++){
		var file = fileInput1.files[i];
		formData.append('fileToUpload[]', file);
	}
	
	for(var i = 0; i < filesLength2; i++){
		var file = fileInput2.files[i];
		formData.append('fileToUpload[]', file);
	}
	
	for(var i = 0; i < filesLength3; i++){
		var file = fileInput3.files[i];
		formData.append('fileToUpload[]', file);
	}
	
	for(var i = 0; i < filesLength4; i++){
		var file = fileInput4.files[i];
		formData.append('fileToUpload[]', file);
	}
	formData.append('u_name', name);
	
	$.ajax({
		type: "POST",
		enctype: 'multipart/form-data',
		url: "ajax_file.php",
		data: formData,
		processData: false,
		contentType: false,
		cache: false,
		timeout: 600000,
		success: function (response) {
			if(response == "error"){
				alert('파일업로드 오류');
			} else {
				file_path = response;
				jQuery.ajax({ 
					type: "POST",
					url: "multifile_upload_form.php",
					data: {"function": fnc, "name": name, "file_path":file_path, "board_no":board_no, "user_no":user_no},
					async : false, 
					dataType : "json", 
					success: function(data) {
						if (data.resultCode == 0) {
							jQuery.ajax({ 
								type: "POST",
								url: "email_send.php",
								data: {"function": mailfnc, "auth" : auth},
								async : false, 
								dataType : "json", 
								success: function(data) {
									alert("입사지원이 완료되었습니다.");
									location.href = "/folder_name/job_board.php";
								},
								error: function (data) {
									alert("메일 발생 오류가 발생했습니다. 관리자에게 문의해주시기 바랍니다.");
								}
							});
						}
					}, error: function (data) {
						alert("DB오류가 발생했습니다. 관리자에게 문의해주시기 바랍니다.");
					}
				});
			}
		}, error: function (response) {
			alert('파일오류가 발생했습니다. 관리자에게 문의해주시기 바랍니다.');
		}
	});
}

function sample6_execDaumPostcode() { //etc. 우편번호 api - https://postcode.map.daum.net/guide
	new daum.Postcode({
		oncomplete: function(data) {
			var addr = '';
			var extraAddr = '';

			if (data.userSelectedType === 'R') { //도로명 주소
				addr = data.roadAddress;
			} else { // 지번 주소
				addr = data.jibunAddress;
			}

			if(data.userSelectedType === 'R'){
				if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
					extraAddr += data.bname;
				}
				if(data.buildingName !== '' && data.apartment === 'Y'){
					extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				if(extraAddr !== ''){
					extraAddr = ' (' + extraAddr + ')';
				}
				// 조합된 참고항목을 해당 필드에 넣는다.
				// document.getElementById("sample6_extraAddress").value = extraAddr;
			
			} else {
				// document.getElementById("sample6_extraAddress").value = '';
			}
			document.getElementById('sample6_postcode').value = data.zonecode;
			document.getElementById("sample6_address").value = addr + extraAddr;
			document.getElementById("sample6_detailAddress").focus();
		}
	}).open();
}
</script>
