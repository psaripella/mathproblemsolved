jQuery('document').ready(function(){
	//init outer accordion (group)
	jQuery( "div.unite-category-module-accordion" ).accordion({ header: "div.unite-group-accordion-header" });
	
	//init inner accordion (items)
	jQuery( "div.unite-category-module-accordion-inner" ).accordion({ header: "div.unite-category-module-accordion-inner-header", heightStyle: "content" });

});


	 