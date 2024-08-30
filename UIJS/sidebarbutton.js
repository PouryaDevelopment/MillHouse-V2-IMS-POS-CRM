var navBO = true;


    SidebarBO.addEventListener( 'click', (event) => {
    event.preventDefault();
    

    if(navBO){
    Sidebarcontainer.style.width = '230px' ;
    Sidebarcontainer.style.transition = '0.7s all';
    shrinktext = document.getElementById( 'shrinktxt' );
    shrinktext.style.fontSize = "24.5px" ;
    shrinktext2 = document.getElementById( 'shrinktxt2' );
    shrinktext2.style.fontSize = "25px" ;
    ManBo.style.width = '10px' ;
    POSBO.style.width = '10px' ;

    
    navBO = false;
    } else {
    Sidebarcontainer.style.width = '320px' ;
    Sidebarcontainer.style.transition = '1s all';
    shrinktext = document.getElementById( 'shrinktxt' );
    shrinktext.style.fontSize = "30px" ;
    shrinktext2 = document.getElementById( 'shrinktxt2' );
    shrinktext2.style.fontSize = "30px" ;
    ManBo.style.width = '41px' ;
    POSBO.style.width = '44px' ;
  
    navBO = true;
  }

    });
