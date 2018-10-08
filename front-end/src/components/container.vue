<template lang="jade">
	div.fluid-explore-subnav-view
		div.fluid-subnav-shim
			div.fluid-subnav
				div.subnav-content
					ul.links
						li
							span 發掘
						li
							span 分類
</template>
<script>
	
</script>
<style lang="scss">
	.fluid-subnav-shim{
		width: 100%;
		height: 50px;
    	margin-bottom: 20px;
    	color: $Black;
    	background-color: $White;
    	position: relative;
    	overflow: visible;
    	box-shadow: inset 0 -2px transparent;
    	border-bottom: 1px solid hsla(0,0%,54%,.3);
    	box-sizing: border-box;
    	.fluid-subnav{
    		position: fixed;
		    top: 50px;
		    z-index: 82;
		    -webkit-backface-visibility: hidden;
		    backface-visibility: hidden;
		    .subnav-content{
		    	min-width: 800px;
			    max-width: 80%;
			    height:50px;
			    margin-left: auto;
			    margin-right: auto;
			    padding-left: 130px;
			    padding-right: 130px;
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
</style>