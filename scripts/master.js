var jsMaster = function () {
  jsMaster.prototype.imgSlideListPopulayte = function(domComponent, iTotalImg, strNameImg, strMsgImg)
  {
    domComponent.empty();
    var items = [];
    items.push('<div class="w3-display-container mySlides" style="display: block;"><img src="images/slides/'+strNameImg+'1.jpg" class="imgSlider"><div class="w3-display-bottomleft w3-container w3-text-white"><div class="w3-panel w3-lime"><h2 class="w3-opacity">'+strMsgImg+'</h2></div></div></div>');
    for(var i=1;i<=iTotalImg;i++){
      items.push('<div class="w3-display-container mySlides" style="display: block;"><img src="images/slides/'+strNameImg+i+'.jpg" class="imgSlider"><div class="w3-display-bottomleft w3-container w3-text-white"><div class="w3-panel w3-lime"><h2 class="w3-opacity">'+strMsgImg+'</h2></div></div></div>');
    }
    domComponent.append( items.join('') );
  }
  jsMaster.prototype.setBase64JSONstringLogin = function(strData1,strData2){
    objJson = {
      strData1:strData1,
      strData2:strData2
    }
    strData = JSON.stringify(objJson);
    strData = btoa(strData);
    return strData;
  }
};
