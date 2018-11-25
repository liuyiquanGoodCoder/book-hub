<template lang="jade">
	div
		div.container
			div.product-row
				div.product-detail
					div.book-image
						a
							img(v-bind:src="bookInfo.img_l")
						div.book-fav-vote
							a.article-vote
								span.number 20
								span.text Share
							a.article-vote
								span.number.Add 
								span.text Add
							a.article-vote.watch
								span.number 52.6K
								span.text Watch
					div.book-info
						div.book-series Book Hub
						div.book-title
							h2 {{productName}}
						div.book-author
							span {{bookInfo.author}}
							br   
							span {{bookInfo.publisher}}
						div.book-status
							span.tag 
								a.post-tag javacript
								a.post-tag web
								a.post-tag front-end
						div.book-introduction JavaScript。
				div.bought-side
					div.book-approaches
						dl
							dt E-book
							dd 
								span.price $64.99
						dl.ebook-formats
							dt Format
							dd
								a mobi
								span.fa-check
								a pdf
								span.fa-no
							div.buy-btns
								a.buy-btn Add to Cart
							hr
							dl
								dt paperback
								span.price ${{bookInfo.price}}
							div.buy-btns
								a.buy-btn(@click="addCart") Add to Cart
							div.where-to-buy
								h4 Other Buy
								ul
									li
										a(href="",target="_blank") Amazon
									li
										a(href="",target="_blank") Amazon
									li
										a(href="",target="_blank") Amazon
									li
										a(href="",target="_blank") Amazon
                                
</template>
<script>
	export default {
		props:['productName'],
		data() {
			return {
				bname:this.productName,
				url:'http://jwt.test/api/findbook/',
				bookInfo:"",
				bid:"",
				cookie:document.cookie,
				token:""

			}
		},
		mounted(){
			
			let $this = this;
			axios.get($this.url+this.bname).then(function (response) {
				    if(response.status == 200){
				    	$this.bookInfo = response.data.data[0];
				    	$this.bid = $this.bookInfo.id;
				    	console.log($this.bid);
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
			});
		},
		components: {
		},
		methods:{
			addCart(){
				let userInfo = this.cookie.split("|");
		 	    this.token = userInfo[1];
		 	    //add if
				axios.post("http://jwt.test/api/addtocarts", {
				    	"bid":this.bid,
						"quantity":1,
						"token":this.token
				  })
				  .then(function (response) {
				  	console.log(response);
				  })
				  .catch(function (error) {
				    console.log(error);
				});
				this.$emit('showCart',true);
			}
		}

	}
</script>
<style lang="scss" scoped>
	.container{
		padding-right: 15px;
	    padding-left: 15px;
	    margin-right: auto;
	    margin-left: auto;
	    width: 1170px;
	    .product-row{
	    	margin-top: 40px;
	    	margin-left: -25px;
    		margin-right: -25px;
    		.product-detail{
    			float: left;
    			width: 75%;
    			padding-left: 25px;
    			padding-right: 25px;
    			.book-image{
    				float: left;
    				width: 33%;
    				a{
    					width:90%;
    					height: auto;
					    display: block;
					    margin-bottom: 20px;
					    img{
					    	position: static;
    						border-radius: 2px;
    						width: 100%;
						    -webkit-box-shadow: 2px 2px 10px rgba(0,0,0,.2);
						    -khtml-box-shadow: 2px 2px 10px rgba(0,0,0,.2);
						    -moz-box-shadow: 2px 2px 10px rgba(0,0,0,.2);
						    -ms-box-shadow: 2px 2px 10px rgba(0,0,0,.2);
						    -o-box-shadow: 2px 2px 10px rgba(0,0,0,.2);
						    box-shadow: 2px 2px 10px rgba(0,0,0,.2);
						    -webkit-transition: all,.25s,ease;
						    -khtml-transition: all,.25s,ease;
						    -moz-transition: all,.25s,ease;
						    -ms-transition: all,.25s,ease;
						    -o-transition: all,.25s,ease;
						    transition: all,.25s,ease;
					    }
					    
    				}
    				.book-fav-vote{
    					font-size: 0;
    					margin-bottom: 20px;
    					.article-vote{
    						display: inline-block;
    						width: 20%;
    						min-width: 60px;
						    text-align: center;
						    font-size: 12px;
						    text-decoration: none;
						    margin-right: 10px;
						    padding: 7px 4px;
						    background: $backgroundGrey;
						    border-radius: 4px;
						    color: $titleBlue;
    						.number{
    							display: block;
    							font-size: 24px;
							    line-height: 35px;
							    font-weight: 500;
							    color: $Grey;

    						}
    						.text{
    							display: block;
    							font-size: 16px;

    						}
    						.Add{
    							margin-left: 19px;
							    margin-top: 7px;
							    margin-bottom: 11px;
							    width: 24px;
							    height: 17px;
    							background: url(../basic/images/icons.png) -472px -448px no-repeat;;
    						} 
    					}
    					.watch{
    						width: 35%;
						    border: 1px solid $backgroundGrey;
						    background: $White;
    					}
    				}
    			}
    			.book-info{
    				float: left;
    				width: 67%;
    				.book-series{

    				}
    				.book-title{
    					margin: 10px 0;
    					font-size: 22px;
    				}
    				.book-author{
    					color: $Grey;
    				}
    				.book-status{
    					 margin: 10px 0;
    					.tag{
    						 box-sizing: border-box;
    						.post-tag{
    							display: inline-block;
							    color: $titleBlue;
							    border-bottom-right-radius: 12px;
							    border-top-right-radius: 12px;
							    border-bottom-left-radius: 3px;
							    border-top-left-radius: 3px;
							    border-bottom: 1px solid $titleBlue;
							    border-right: 1px solid $BlueFont;
							    font-size: 14px;
							    line-height: 16px;
							    margin: 4px 4px 4px 0;
							    padding: 4px 16px 4px 8px;
							    text-decoration: none;
							    white-space: nowrap;
							    background-color: $tagWhite;
							    background-image: url(/staticitr/css/data:image/gif;base64,R0lGODlhEAAQAIAAAAAAAP/yH5BAEHAAAALAAAAAAQABAAAAIThI+py+0PIwwhUjqvrbL7D4ZHAQA7);
							    background-repeat: no-repeat;
							    background-position: right center;
    						}
    					}
    				}
    				.book-introduction{
    					margin: 12px 0;
					    position: relative;
					    color: $Grey;
					    padding: 0;
    				}

    			}
    		}
    		.bought-side{
    			float: right;
    			padding-left: 25px;
    			padding-right: 25px;
    			width: 16%;
    			.book-approaches{
    				background: $backgroundGrey;
				    padding: 20px;
				    border-radius: 2px;
				    min-height: 90px;
    				dl{
    					line-height: 1.6;
    					margin-bottom: 2px;
    					margin-top:0; 
    					dt{
    						font-weight: normal;
						    line-height: 1.6;
						    float: left;
						    padding-right: 1em;

    					}
    					dd{
    						padding-left: 10px;
    						line-height: 1.6;
    						a{
    							color: $Green;
    							border-bottom: 1px dotted $Green;
    						}
    						.fa-check{
    							display: inline-block;
							    width: 19px;
							    height: 8px;
							    background: url(../basic/images/icons.png) -518px -67px no-repeat;
    						}
    						.fa-no{
    							display: inline-block;
							    width: 19px;
							    height: 8px;
							    background: url(../basic/images/icons.png) -518px -77px no-repeat;
    						}

    					}
    					.price{
    						font-weight: bold;
    						color: $priceOrange;
						    font-size: 18px;
						    line-height: 1;
    					}
    				}
    				.buy-btns{
    					clear: both;
    					margin: 10px 0 0 0;
    					.buy-btn{
    						display: block;
    						color: $White;
						    background-color: $priceOrange;
						    border-color: $priceOrange;
						    padding: 6px 12px;
						    margin-bottom: 0;
						    font-size: 17px;
						    font-weight: 400;
						    line-height: 1.42857143;
						    text-align: center;
						    white-space: nowrap;
						    vertical-align: middle;
						    -ms-touch-action: manipulation;
						    touch-action: manipulation;
						    cursor: pointer;
						    -webkit-user-select: none;
						    -moz-user-select: none;
						    -ms-user-select: none;
						    user-select: none;
						    background-image: none;
						    border: 1px solid transparent;
						    border-radius: 4px;
    					}
    				}
    				hr{
    					display: block;
					    unicode-bidi: isolate;
					    overflow: hidden;
					    border-style: inset;
					    border-width: 1px;
					    margin: 16px 0 10px 0;
    					border: 1px dashed $Greyunderline;
    				}
    				.where-to-buy{
    					margin-top: 20px;
					    padding: 10px;
					    background: $White;
					    border-radius: 2px;
    					h4{
    						text-align: center;
						    font-size: 17px;
						    font-weight: bolder;
						    color: $Grey;
						    margin: 0 0 4px 0;
    					}
    					ul{
    						list-style: circle;
    						padding-left: 20px;
    						margin: 0;
    						li{
    							margin: 0;
    							padding: 0;
    							a{
    								text-decoration: none;
    								color: $titleBlue;
								    -webkit-transition: all,.25s,ease;
								    -khtml-transition: all,.25s,ease;
								    -moz-transition: all,.25s,ease;
								    -ms-transition: all,.25s,ease;
								    -o-transition: all,.25s,ease;
								    transition: all,.25s,ease;
    							}
    						}
    					}
    				}
    			}
    		}
	    }
	}
</style>