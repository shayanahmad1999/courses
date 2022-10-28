const navbar = document.querySelector('#navbar');
const heading = document.getElementById('heading');

navbar.addEventListener('mousemove', navbarFunction);
function navbarFunction(e)
{
    document.body.style.backgroundColor = `rgb(${e.offsetX}, ${e.offsetY}, 50)`;
    heading.style.color = `rgb(${e.offsetX}, 255, ${e.offsetX})`;
}
navbar.addEventListener('mouseover', function(e){
    heading.style.border = '2px solid white';
    heading.style.borderRadius = '20rem';
    heading.style.borderColor = `${e.offsetX}`;
    heading.style.borderWidth = '0.3rem';
    heading.style.width = '20rem'
    heading.style.padding = '1rem';
    heading.style.transition = '0.5s ease-in';
});
