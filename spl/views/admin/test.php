
<style>
body {
	color: #222;
	font: 14px Arial;
}

body a {
	color: #3D5C9D;
	text-decoration: none;
}
</style>
<script>
      var html5rocks = {};
      html5rocks.webdb = {};
      html5rocks.webdb.db = null;
      
      html5rocks.webdb.open = function() {
        var dbSize = 1 * 1024 * 1024; // !5MB
        html5rocks.webdb.db = openDatabase("stn", "1.0", "Stn manager", dbSize);
       
      }
      
      
      html5rocks.webdb.createTable = function() {
        var db = html5rocks.webdb.db;
        db.transaction(function(tx) {
          tx.executeSql("CREATE TABLE IF NOT EXIST stn_products(ID INTEGER PRIMARY KEY, product_id INTEGER,package_id INTEGER,batch_id INTEGER,qunarity INTEGER, product_name TEXT, package_name TEXT, batch_name TEXT, added_on DATETIME)", []);
        
        });
      }
      
      html5rocks.webdb.addTodo = function(product_id,package_id,batch_id,qunarity,products,packages,batch_nos) {
        var db = html5rocks.webdb.db;

         html5rocks.webdb.get_similiar_product(product_id,package_id,batch_id,if_count_zero);
        
        db.transaction(function(tx){
        	var uid=product_id+package_id+batch_id;
        	var addedOn = new Date();
        	  tx.executeSql("INSERT INTO stn_products(product_id,package_id,batch_id,qunarity, product_name,package_name,batch_name,added_on) VALUES (?,?,?,?,?,?,?,?)",
              [product_id,package_id,batch_id,qunarity,products,packages,batch_nos, addedOn],
              html5rocks.webdb.onSuccess,
              html5rocks.webdb.onError);
         });
      }
      
      html5rocks.webdb.onError = function(tx, e) {
        alert("There has been an error: " + e.message);
      }
      
      html5rocks.webdb.onSuccess = function(tx, r) {
        // re-render the data.
        html5rocks.webdb.getAllTodoItems(loadTodoItems);
      }
      
      
      html5rocks.webdb.getAllTodoItems = function(renderFunc) {
        var db = html5rocks.webdb.db;
        db.transaction(function(tx) {
          tx.executeSql("SELECT * FROM stn_products", [], renderFunc,html5rocks.webdb.onError);
        });
      }
      html5rocks.webdb.get_similiar_product = function(product_id,package_id,batch_id,renderFunc) {
          var db = html5rocks.webdb.db;
          db.transaction(function(tx) {
            tx.executeSql("SELECT COUNT(ID) FROM stn_products where product_id=? AND package_id=? AND batch_id=? ", [product_id,package_id,batch_id], renderFunc,html5rocks.webdb.onError);
          });
        }
      html5rocks.webdb.deleteTodo = function(id) {
        var db = html5rocks.webdb.db;
        db.transaction(function(tx){
          tx.executeSql("DELETE FROM stn_products WHERE ID=?", [id],
              html5rocks.webdb.onSuccess,
              html5rocks.webdb.onError);
          });
      }
      
      function loadTodoItems(tx, rs) {
        var rowOutput = "";
        var todoItems = document.getElementById("todoItems");
        for (var i=0; i < rs.rows.length; i++) {
          rowOutput += renderTodo(rs.rows.item(i));
        }
      
        todoItems.innerHTML = rowOutput;
      }
      function if_count_zero(tx, rs) {

            alert(rs.rows[0]['ID']);
                  
        }
      
      
      function renderTodo(row) {
        return "<li>" + row.product_name  + " " + row.package_name  + "" + row.batch_name  + "" + row.qunatity  + "[<a href='javascript:void(0);'  onclick='html5rocks.webdb.deleteTodo(" + row.ID +");'>Delete</a>]</li>";
      }
      
      function init() {
        html5rocks.webdb.open();
        html5rocks.webdb.createTable();
        html5rocks.webdb.getAllTodoItems(loadTodoItems);
      }
      
      function addTodo() {
    	  var e = document.getElementById("products");
  		var products = e.options[e.selectedIndex].text;
  		sproduct_id=e.options[e.selectedIndex].value;
  		var e = document.getElementById("packages");
  		var packages = e.options[e.selectedIndex].text;
  		package_id=e.options[e.selectedIndex].value;
  		var e = document.getElementById("batch_nos");
  		var batch_nos = e.options[e.selectedIndex].text;
  		var selected_quantity = $("#selected_quantity").val();
  		
        html5rocks.webdb.addTodo(product_id,package_id,selected_batch_no,selected_quantity,products,packages,batch_nos);
        
      }
   
    	
    	var product_id = 0;
    	var package_id = 0;
    	var available_unit = 0;
    	var selected_batch_no=0;
    	
    	window.onload = function() {
    		init();
    		get_available_short_code();
    		
    	};
    	function on_product_change(){
    		     var a=$('#products').val();
    			 if(a!= 0){
    				 product_id=a;
    				 get_available_packages(a);
    			 }
    	}
    	function on_package_change(){
    	    var a=$('#packages').val();
    		 if(a!= 0){
    			 package_id=a;
    			 get_available_batches(a);
    		 }
    	}
    
    	function on_batch_change(){
        	
    	    var selected = $(this).find('option:selected');
    	   	available_unit = selected.data('foo'); 
    	   	selected_batch_no = selected.data('batch'); 
    		
    	}
    	function get_available_short_code(){
    		$('#products').empty();
    		$.ajax({
    			url: '<?php echo URL;?>stocks/get_available_short_code/',
    			type: 'GET',
    			dataType: 'JSON',
    			success: function(data) {
    				$('#products').append($("<option></option>").attr("value",0).text('Available products'));
    				$.each(data ,function(i,value) {
    					  $('#products').append($("<option></option>").attr("value",value.id).text(value.name));
    			      });
    			}
    		});
    	}
    	function get_available_packages(product_id){
    		$('#packages').empty();
    		$.ajax({
    			url: '<?php echo URL;?>stocks/get_available_packages/'+product_id,
    			type: 'GET',
    			dataType: 'JSON',
    			success: function(data) {
    				$('#packages').append($("<option></option>").attr("value",0).text('Available packages'));
    				$.each(data ,function(i,value) {
    					  $('#packages').append($("<option></option>").attr("value",value.id).text(value.name));
    			      });
    			}
    		});
    	}

    	function get_available_batches(package_id){
    		$('#batch_nos').empty();
    		$.ajax({
    			url: '<?php echo URL;?>stocks/get_available_batches/',
    			type: 'GET',
    			data: {package_id: package_id,product_id: product_id},
    			dataType: 'JSON',
    			success: function(data) {
    				$('#batch_nos').append($("<option></option>").attr("value",0).text('Available batches'));
    				$.each(data ,function(i,value) {
    					  
    					  $('#batch_nos').append($('<option value="'+value.id+'" data-foo="'+value.available_unit+'" data-batch="'+value.batch_no+'">'+value.name+'</option>'));
    					  
    			      });
    			     
    			}
    		});
    	}
    </script>
<div class="container">
	<label><strong>Stock Transfer</strong> from <strong>Rangia </strong>(RD)
		to <strong>Guwahati</strong> (GD)</label> <br>
	<hr>
	<br>
	<div class="row-fluid" id="add_stn_row">

		<form class="inline-form">
			<input class="span2" type="text" id="delevery_date"
				placeholder="delevery date"> <input class="span2" type="text"
				placeholder="despatch no"> <input class="span2" type="text"
				id="despatch_date" placeholder="despatch_date"> <input class="span2"
				type="text" placeholder="despatch_through"> <input class="span2"
				type="text" placeholder="remarks">
		</form>


		<form class="form-inline" id="add_cart_form"
			onsubmit="addTodo(); return false;">
			<input class="input-mini disabled" id="disabledInput" type="text"
				placeholder="#" disabled="disabled"> <select id="products"
				onchange="on_product_change()"></select> <select id="packages"
				onchange="on_package_change()"></select> <select id="batch_nos"
				onchange="on_batch_change()"></select> <input type="number"
				class="input-mini" placeholder="Boxes" name="quantity"
				id="selected_quantity">
			<button type="submit" class="btn btn-primary">Transfer</button>
			<div id="hidden_product_id">
				<input type="hidden" name="product_id" id="product_id">
			</div>
		</form>
	</div>
	<ul id="todoItems">
	</ul>
</div>
