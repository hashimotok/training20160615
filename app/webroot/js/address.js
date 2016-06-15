/*Controllerに渡す*/
function addressSearch (postCd) {
  $.ajax({
    url:"/addresses/search",
    type:"POST",
    data: {postnum : postCd},
    dataType: "json",
    success: function(data, dataType){
      changeTextForm(data);
    },
    error: function(data, dataType){
      alert('通信失敗');
    }
  });
}

/*Controllerからの応答内容を設定*/
function changeTextForm(data) {
  //console.log(JSON.stringify(data));
  //console.log(Object.keys(data));
  //var objAddress1 = data[Object.getOwnPropertyNames(data)];
  //console.log(objAddress1); //Object {230780: "横浜市保土ケ谷区"}
  //console.log(objAddress1[Object.getOwnPropertyNames(objAddress1)]);//横浜市保土ヶ谷区
  if(Object.keys(data) != "" ){
    var option1 = 0;
    var option2 = 0;
    for(var ad2 in data) {
      data = data[ad2];
      for(var ad2_1 in data){
      option1 = "<option var=\"" + ad2 + "\">" + ad2_1 + "</option>" ;
      option2 += "<option var=\"" + ad2 + "\">" + data[ad2_1] + "</option>" ;
      }
    }
    $('#AddressAddress1').html(option1);
    $('#AddressAddress2').html(option2);
    $('#address_id').val(ad2);
    //$('#AddressAddress3').val(data['Address']['address3']);
  }else{
    alert('存在しない郵便番号です');
  }
}
