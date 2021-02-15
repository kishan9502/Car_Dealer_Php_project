function searchCustomer(){
    try{
        //variable is needed for an Ajax operation
        var abc = getXmlHttpRequest();
        abc.onreadystatechange = function(){
            //ready states of ajax
            
            if(abc.readyState == 4 && abc.status == 200){
                document.getElementById('searchResult').innerHTML =abc.responseText;
            }
            
            ////
        }

        abc.open("POST","search_purchase.php");
        //specify that the request doesnot contain binary data
        abc.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        var searchTextbox=document.getElementById('searchQuery');
        var searchQuery=searchTextbox.value;
        
        abc.send("searchQuery="+searchQuery);
       
     }
    catch(error){}
        
    
}

function getXmlHttpRequest(){
    try{
            var abc=null;
        if(window.XMLHttpRequest){
            abc=new XMLHttpRequest();
        }
        else{
             abc=new XMLHttpRequest();
        }
        return abc;
    }
    catch(error){
         handleError(error);
    }
    
}