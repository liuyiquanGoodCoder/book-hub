/**
 * 网络post请求可选择是否带参
 * @param {*} url    
 * @param {*} data   
 * @param {*} success 
 * @param {*} error   
 */

function post(url, data){
  $.ajax({
    type:'post',
    url:url,
    data:data,
    dataType:"json",
    success:function(data){
      console.log(data)
    },
    error : function (data) {
        console.log(data)
    }
  });
};

/**
 * 网络get请求，可选择是否带参
 * @param {*} url   
 * @param {*} data  
 * @param {*} success 
 * @param {*} error  
 */
function get(url , data , success , error) {
     $.ajax({  
              type : 'get',  
              url : url,
              data : data,
              dataType: "json",
              contentType: "application/json; charset=UTF-8",
              success : function(result) { 
                 if(result.code  !== '001') {
                     error(result);
                 }else{
                     success(result.data)
                 }
              },
              error : function erryFunction() {
                 error("");
              }
          });
};
//key
export { 
  post,
  get
}