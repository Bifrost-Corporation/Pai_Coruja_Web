$(".dropdown-dados, .dropdown-dados-lista").hover(function() {
    //Hover inn function
    var nthNumber = $(this).index() + 1;
  
    $("[id$=Submenu]").show();
    $("[id$=Submenu] .submenu_panel:nth-of-type(" + nthNumber + ")").show();
  }, function() {
    //Hover out function
    $("[id$=Submenu]").hide();
    var nthNumber = $(this).index() + 1;
    $("[id$=Submenu] .submenu_panel:nth-of-type(" + nthNumber + ")").hide();
  });