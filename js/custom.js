// JavaScript Document
$( ".accordion" ).accordion({
	  heightStyle: "content",
	  collapsible: true,
	  active:false
});

$( "#tabs" ).tabs();

$( "#acre" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-acre.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#amazonas" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-amazonas.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#alagoas" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-alagoas.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#bahia" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-bahia.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#ceara" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-ceara.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#distritoFederal" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-distrito-federal.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#espiritoSanto" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-espirito-santo.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#goias" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-goias.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#maranhao" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-maranhao.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#matoGrossoSul" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-mato-grosso-sul.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#matoGrosso" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-mato-grosso.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#minasGerais" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-minas-gerais.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#para" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-para.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#paraiba" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-paraiba.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#parana" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-parana.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#pernambuco" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-pernambuco.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#piaui" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-piaui.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#rioDeJaneiro" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-rio-janeiro.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#rioGrandeNorte" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-rio-grande-norte.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#rioGrandeSul" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-rio-grande-sul.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#roraima" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-roraima.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#santaCatarina" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-santa-catarina.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#saoPaulo" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-sao-paulo.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#sergipe" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-sergipe.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$( "#tocantins" ).hover(
  function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-tocantins.jpg");
  }, function() {
    $( "#mapaBrasil" ).attr("src","images/mapa-brasil.jpg");
  }
);

$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});