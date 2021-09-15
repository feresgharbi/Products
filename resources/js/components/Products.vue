<template>
 <div>

<div class="container">

    <div class="grid">

        <div class="content">
            <ul class="rig columns-4">
                <li>
                    <h1>Name</h1>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <div class="price"> $999.99</div>
                    <div class="category">Category</div>
                    <div class="available">available</div>
           
                    <hr>
                    <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button>
                </li>
            </ul>
        </div>

        <div class="sidebar">

            <!-- Category List Start -->

            <h3>Categories</h3>

            <div class="list-group">

                <a href="category.html" class="list-group-item">Apparel &amp; Accessories</a>

                <a href="category.html" class="list-group-item">Baby Products</a>

                <a href="category.html" class="list-group-item">Beauty &amp; Health</a>

                <a href="category.html" class="list-group-item">Electronics</a>

                <a href="category.html" class="list-group-item">Furniture</a>

                <a href="category.html" class="list-group-item">Home &amp; Garden</a>

                <a href="category.html" class="list-group-item">Luggage &amp; Bags</a>

                <a href="category.html" class="list-group-item">Shoes</a>

                <a href="category.html" class="list-group-item">Sports &amp; Entertainment</a>

                <a href="category.html" class="list-group-item">Watches</a>

            </div>

        </div>
    </div>
    <!-- /.container class with content as the id-->


    <!-- Footer -->

    <div class="container">

        <hr>

        <footer>

            <div class="row">

                <div class="col-lg-12">

                    <p>Copyright © <a href="ecommerce.html">Black&amp;White Publishing</a> 2017</p>

                </div>

            </div>

        </footer>

    </div>
</div>
 </div>
  
</template>
<style>
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);

/* resets */
*,
*:before,
*:after {
  box-sizing: border-box;
}
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

/* Grid layout */
.grid {
  display: grid;
  grid-auto-columns: 1fr 200px;
}

.content {
  grid-column: 1;
}

.sidebar {
  grid-column: 2;
  margin: 5px;
  padding: 5px;
}

.grid > * {
  border: 0px; /* demo only */
}

/* Product Grid */

body {
  background: #fff;
}

h1 {
  font-weight: 500;
  font-size: 20px
}

ul.rig {
  list-style: none;
  font-size: 0px;
  margin-left: -2.5%;
  /* should match li left margin */
}

ul.rig li {
  display: inline-block;
  padding: 10px;
  margin: 0 0 2.5% 2.5%;
  background: #fff;
  border: 1px solid #ddd;
  font-size: 16px;
  font-size: 1rem;
  vertical-align: top;
  box-shadow: 0 0 0px #000000;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

ul.rig li img {
  max-width: 80%;
  height: auto;
  margin: 0 0 10px;
}

ul.rig li h3 {
  margin: 0 0 10px;
}

ul.rig li p {
  font-size: 1.0em;
  line-height: 1.5em;
  color: #000000;
}


/* class for 2 columns */

ul.rig.columns-2 li {
  width: 47.5%;
  /* this value + 2.5 should = 50% */
}


/* class for 3 columns */

ul.rig.columns-3 li {
  width: 30.83%;
  /* this value + 2.5 should = 33% */
}


/* class for 4 columns */

ul.rig.columns-4 li {
  width: 22.5%;
  /* this value + 2.5 should = 25% */
}

@media (max-width: 680px) {
  ul.grid-nav li {
    display: inline-block;
    margin: 0 0 5px;
  }
  ul.grid-nav li a {
    display: inline-block;
    margin: 0 0 5px;
  }
  ul.rig {
    margin-left: 0;
  }
  ul.rig li {
    width: 100% !important;
    /* over-ride all li styles */
    margin: 0 0 10px;
  }
}
</style>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>