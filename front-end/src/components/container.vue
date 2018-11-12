<template lang="jade">
	div.fluid-explore-subnav-view
		div.fluid-subnav-shim
			div.fluid-subnav
				div.subnav-content.container
					ul.links
						li
							span Javascript
						li
							span PHP
						li
							span ios
						li
							span nodeJs
						li
							span Java
		div.fluid-explore-subnav-row.container
			div.row-books
				div.books-header
					h4 
						a Popular Books
					div.book-btn
						a.btn
							span.fa.left 
						a.btn
							span.fa.right
				ul.books-items
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
					li.book-item
						div.book-img
							a
								img(src="http://file.ituring.com.cn/SmallCover/181054529974c29f37d5")
						div.book-info
							div.name
								a(href="/book/2464") 我的第一本算法书
							div.author
								span 宫崎修一&nbsp;&nbsp;石田保辉
								span 张贝&nbsp;&nbsp;译
</template>
<script>
	
</script>
<style lang="scss">
	.container{
		padding-right: 15px;
	    padding-left: 15px;
	    margin-right: auto;
	    margin-left: auto;
	    width: 1170px;
	}
	.fluid-subnav-shim{
		width: 100%;
		height: 50px;
    	color: $Black;
    	background-color: $White;
    	position: relative;
    	overflow: visible;
    	box-shadow: inset 0 -2px transparent;
    	border-bottom: 1px solid $Greyunderline;
    	box-sizing: border-box;
    	.fluid-subnav{
		    top: 50px;
		    z-index: 82;
		    -webkit-backface-visibility: hidden;
		    backface-visibility: hidden;
		    .subnav-content{
		    	min-width: 800px;
			    height:50px;
			    .links{
			    	 -webkit-touch-callout: none;
				    list-style: none;
				    padding: 0;
				    margin: 0;
				    text-align: center;
				    height: 47px;
				    font-size: 16px;
				    font-weight: 400;
				    position: absolute;
				    height: 50px;
				    box-sizing: border-box;
				    white-space: nowrap;
				    -webkit-user-select: none;
				    -moz-user-select: none;
				    -ms-user-select: none;
				    user-select: none;
				    li{
				    	height: 100%;
					    box-sizing: border-box;
					    cursor: pointer;
					    outline: none;
					    border-bottom: 3px solid transparent;
					    margin-right: 25px;
					    display: inline-block;
					    -webkit-transition: border-bottom .1s linear;
					    transition: border-bottom .1s linear;
				    	border-bottom: 3px solid $Bluesky;
				    	span{
						    display: inline-block;
						    padding: 12px 20px;
						    font-size: 13pt;
    						font-weight: bolder;
						    opacity: .75;
						    box-sizing: border-box;
				    	}
				    }

			    }
		    }
    	}
	}
	.fluid-explore-subnav-row{
		padding-right: 15px;
	    padding-left: 15px;
	    margin-right: auto;
	    margin-left: auto;
    	.row-books{
    		.books-header{
    			width: 80%;
    			background: none;
			    border: none;
			    padding: 0;
			    height: auto;
			    margin: 30px 0 6px 0;
			    border-bottom: 1px solid $Greyunderline;
			    position: relative;
			    h4{
			    	font-size: 22px;
				    line-height: 1.4;
				    margin: 0;
				    padding: 0;
				    font-weight: 700;
				    min-height: 40px;
				    color: $Grepbright;
				    a{
				    	color: inherit;
				    }
			    }
			    .book-btn{
			    	position: absolute;
				    right: 0;
				    bottom: 8px;
			    	.btn{
			    		margin-left:5px; 
			    		border-radius: 20px;
					    color: $Greyunderline;
					    padding: 0px 20px;
					    font-size: 17px;
					    line-height: 10px;
					    border: 1px solid $Greyunderline;
					    height: 10px;
					    .fa{
					    	pointer-events: none;
						    display: inline-block;
						    margin-bottom: 2px;
						    width: 10px;
						    height: 7px;
						    background: url(../basic/images/icons.png) -523px -112px no-repeat;
						    
					    }
					    .left{
					    	transform: rotate(90deg);
					    }
					    .right{
    						transform: rotate(270deg);
					    }
			    	}
			    }
    		}
    		.books-items{
    			white-space: nowrap;
			    margin-left: 0;
			    margin-right: 0;
			    padding:0;
			    overflow: auto;
			    -ms-overflow-style: none;
			    width: 80%;
			    height: auto;
			    .book-item{
			    	display: inline-block;
			    	float: left;
			    	margin-left: -15px;
			    	list-style-type: none;
			    	margin-top: 6px;
				    padding: 0 15px;
				    text-align: center;
				    vertical-align: top;
				    width: 18%;
				    height: 250px;
			    	.book-img{
			    		padding: 0 0 2px 1px;
					    margin-bottom: 0;
					    position: relative;
					    a{
					    	position: relative;
						    display: inline-block;
						    width: 116px;
						    height: 170px;
						    img{
						    	position: absolute;
							    left: 0;
							    bottom: 0;
							    display: block;
							    max-width: 100%;
							    max-height: 160px;
							    height: auto;
							    width: auto;
							    vertical-align: bottom;
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
			    	}
			    	.book-info{
			    		white-space: normal;
			    		.name{
			    			a{
			    				display: inline-block;
							    text-decoration: none;
							    color: $titleBlue;
							    font-size: 15px;
    							font-weight: bolder;
							    max-width: 80%;
							    max-height: 160px;
							    height: auto;
							    width: auto;
							    overflow: auto;
							    white-space: normal;
			    			}
			    		}
			    		.author{
			    			span{
			    				display: inline-block;
							    width: 100%;
							    font-size: 14px;
							    text-overflow: ellipsis;
							    white-space: nowrap;
							    color: $Grey;
							    opacity: 0.8;
			    			}
			    		}

			    	}
			    }
    		}    
    	}
	}
</style>