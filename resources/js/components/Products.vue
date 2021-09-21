<style src="./product.css"> </style>
<template>
 <div>
                   

<div class="container">

     
        <div class="col-lg-6" >
      
 <div class="sidebar">
  
  <div  class="category">
      <h1>Category</h1>
      <div class="form-check" v-for="(category, index) in categories" :key="category.id"  >
                    <input class="form-check-input" type="checkbox" :value="category.id" v-model="selected.categories">
                    <label class="form-check-label" :for="'category' + index" >
                        {{ category.name }} 
                    </label>
                </div></div>
    <div class="price">
   <h1 >Price:</h1>
              <div class="form-check" v-for="(price, index) in prices" :key="price.id">
                    <input class="form-check-input" type="checkbox" :value="index" :id="'price'+index" v-model="selected.prices">
                    <label class="form-check-label" :for="'price' + index">
                        {{ price.name }} 
                    </label>
                </div></div>
                <div class="available">
 <h1 >In Store Availability:</h1>
              <div class="form-check" v-for="(available, index) in availables" :key="available.id">
                    <input class="form-check-input" type="checkbox" :value="index" :id="'available'+index" v-model="selected.availables">
                    <label class="form-check-label" :for="'available' + index">
                        {{available.name}}
                    </label>
                </div></div>
  
</div>
            <ul class="rig columns-3" >
                <li v-for="product in products.data" :key="product.id">
                    <h1>{{product.name}}</h1>
                    <p class="description">{{product.description}}</p>
                    <div class="price"> {{product.price}}</div>
                    <div class="category">{{product.category.name}}</div>
                    
                    <div v-if = "product.available" class="available" :key="product.id">product available</div>
                    
                    <div v-else class="available">product not available</div>
                    <hr>
                    <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button>
                </li>

            </ul>
            <pagination class="pagination"  :data="products"  @pagination-change-page="getResults">
<span slot="prev-nav">&lt; Previous</span>
	<span slot="next-nav">Next &gt;</span>
  </pagination>
      </div>
  </div>


 <div>

 </div>
 
 </div>
  
</template>

<script>
    import pagination from 'laravel-vue-pagination';
    export default {
        data() {

      return {
       data: {},
       categories: [],
      prices :[],
      availables: [],
       products: [], 
      selected: {
         categories: [],
         prices:[] ,
         availables :[],
      
                } 
            }
        },
      
        mounted() {
            this.loadCategories();
            this.loadAvailables();
            this.loadPrices();
            this.loadProducts();
            this.getResults();
       
        },
        watch: {
            selected: {
                handler: function () {
                    this.loadCategories();
                    this.loadAvailables();
                    this.loadPrices();
                    this.loadProducts();
                },
                deep: true
            }
        },
        methods: {
              loadCategories: function () {
                axios.get('/api/categories', {
                        params: _.omit(this.selected, 'categories')
                    })
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadPrices: function () {
                axios.get('/api/prices', {
                        params: _.omit(this.selected, 'prices')
                    })
                    .then((response) => {
                        this.prices = response.data;
                     
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadAvailables: function () {
                axios.get('/api/availables', {
                        params: _.omit(this.selected, 'availables')
                    })
                    .then((response) => {
                        this.availables = response.data;
                     
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            
            loadProducts: function () {
                axios.get('/api/products', {
                        params: this.selected
                    })
                    .then((response) => {
                        this.products = response.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
               
               getResults(page = 1) {
			axios.get('/api/products?page=' + page,  {
                        params: this.selected
                    })
				.then(response => {
					this.products = response.data;
				});
		},
	},
          
		}
        
        
  
</script>