$(function() {
  var counter = 0;
  var imageArray = 0;
  $("#my-bedroom-increment").click(function() {
    if(counter < 5) {
      counter++;
      imageArray++;
      $("#increment-number").text(counter);

      var image = $(".counter-increment")
        .find("img")
        .attr("src", "assets/images/bedroom/flat-"+imageArray+".png").length;
      console.log(image);
    }
  });
  $("#my-bedroom-decrement").click(function() {
    if (counter >= 2) {
      counter--;
      imageArray--;
      $("#increment-number").text(counter);

      var image = $(".counter-increment")
        .find("img")
        .attr("src", "assets/images/bedroom/flat-" + imageArray + ".png").length;
      console.log(image);
    }
  });
});

$(function() {
  var houseCounter = 0;
  var houseimageArray = 0;
  $("#my-house-increment").click(function() {
    if (houseCounter < 5) {
      houseCounter++;
      houseimageArray++;
      $("#increment-house-number").text(houseCounter);

      var image = $(".counter-increment")
        .find("img")
        .attr("src", "assets/images/house/house-" + houseimageArray + ".png")
        .length;
      console.log(image);
    }
  });
  $("#my-house-decrement").click(function() {
    if (houseCounter >= 2) {
      houseCounter--;
      houseimageArray--;
      $("#increment-house-number").text(houseCounter);

      var image = $(".counter-increment")
        .find("img")
        .attr("src", "assets/images/house/house-" + houseimageArray + ".png")
        .length;
      console.log(image);
    }
  });
});

