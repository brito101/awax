const filter=document.querySelectorAll(".filter li");const galery=document.querySelectorAll(".galery div");filter.forEach((item)=>{item.addEventListener("click",()=>{galery.forEach((el)=>{el.style.opacity="0.1";el.style.transition=".3s";if(el.dataset.category===item.dataset.category){el.style.opacity="1"}
if(item.dataset.category==="general"){el.style.opacity="1"}})})});const el=document.querySelectorAll("[data-go]")
if(el){el.forEach((i)=>{i.addEventListener("click",(e)=>{e.preventDefault()
window.scroll({top:document.querySelector(i.dataset.go).offsetTop,behavior:"smooth",})})})};const buttons=document.querySelectorAll(".banner-buttons button");const banners=document.querySelectorAll(".banner-content");function fadeInSlide(el){let opactiy=0;const timer=setInterval(()=>{if(opactiy<1){el.style.opacity=opactiy;opactiy+=0.1;el.style.display="inline-block"}else{clearInterval(timer)}},50)}
buttons.forEach((el,key)=>{el.addEventListener("click",()=>{buttons.forEach((element)=>{element.classList.remove("active")});el.classList.add("active");banners.forEach((element)=>{element.style.display="none";element.style.opacity="0"});fadeInSlide(banners[key])})})
let flag=1;setInterval(()=>{buttons[flag].click();flag++;if(flag===3){flag=0}},5000);const team=document.querySelectorAll(".team-worker");const pointerTeam=document.querySelectorAll(".pointer-team");function showTeam(ix){team.forEach((el,i)=>{el.classList.remove("active");el.style.opacity="0";el.style.transition=".3s";if(i>=ix*3&&i<ix+3){el.classList.add("active");el.style.opacity="1"}})}
pointerTeam.forEach((el,i)=>{el.addEventListener("click",()=>{pointerTeam.forEach((item)=>{item.classList.remove("active")});el.classList.add("active");showTeam(i)})});const itemsTestimonials=document.querySelectorAll(".testimonials-items div")
const buttonsTestimonials=document.querySelectorAll(".testimonials-buttons button")
buttonsTestimonials.forEach((el,key)=>{el.addEventListener("click",()=>{buttonsTestimonials.forEach((element)=>{element.classList.remove("active")})
el.classList.add("active")
itemsTestimonials.forEach((element)=>{element.classList.remove("active")})
itemsTestimonials[key].classList.add("active")})})