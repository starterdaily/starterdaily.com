$(function(){

	  	// Upload Imagen Script Editor Admin

	   $('body').on('change','#photoimg', function() {
			var A   = $("#imageloadstatus");
			var B   = $("#imageloadbutton");
			var img = $("#idImagenUpload");

        $("#imageform").ajaxForm({target: '#preview', 

            beforeSubmit:function(){
	            A.show();
	            B.hide();
	            }, 
	            success:function(){
	            A.hide();
	            B.show();
	            img.val($('.message').html());
	            }, 
	            error:function(){
	            A.hide();
	            B.show();
	            } }).submit();
	         });

	  	// Tags Script Editor Admin

	  	$('#tag1').tagsInput(function(){});

	  	// Medium Script Editor Admin

	  		    $(function () {
		            $('.editable').mediumInsert({
		              editor: editor,
		              addons: {
		                images: {},
		                embeds: {},
		              },
		            });    
	    		});


		  	  var editor = new MediumEditor('.editable', {
	            	excludedActions: ['u', 'h3', 'blockquote', 'orderedlist'],
	            	buttonLabels: 'fontawesome',
	          	});

		  	    var editor = new MediumEditor('.editablecategory', {
	            	excludedActions: ['u', 'h3', 'blockquote', 'orderedlist'],
	            	buttonLabels: 'fontawesome',
	          	});

				$('#bton').click(function(){ 
		            $( ".mediumInsert" ).remove();
		            var article = $('.editable').html();
		            $('.textarea').val(article);
				});

				$('#btoncategory').click(function(){ 
		            $( ".mediumInsert" ).remove();
		            var article = $('.editablecategory').html();
		            $('.textarea').val(article);
				});


			function searchpro() {

				var sectionvalue = 'presentador';
				var queryvalue = $('input#searchpro').val();
				$('b#searchpro-string').html(queryvalue);
				if(queryvalue !== ''){
					$.ajax({
						type: "POST",
						url: "../search.php",
						data: { query: queryvalue,
								section: sectionvalue
							 },
						cache: false,
						success: function(html){
							$("ul#resultados").html(html);
						}
					});
				}return false;    
			}

			$("input#searchpro").keyup(function() {

				clearTimeout($.data(this, 'timer'));

				// Set Search String
				var search_string = $(this).val();

				// Do Search
				if (search_string == '') {
					$("ul#resultados").fadeOut();
					$('h4#resultados-text').fadeOut();
				}else{
					$("ul#resultados").fadeIn();
					$('h4#results-text').fadeIn();
					$(this).data('timer', setTimeout(searchpro, 100));
				};
			});

			

});

