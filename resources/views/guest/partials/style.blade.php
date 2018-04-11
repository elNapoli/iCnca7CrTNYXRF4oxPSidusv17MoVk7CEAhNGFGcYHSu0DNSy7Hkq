<style type="text/css">

.welcomeImage{
  position: relative;
}

img{
  max-width: 100%;
}

/*CSS figura titulo de sección*/
.shape{
  font-weight: bold;
  text-align:center;
  background-color: #5caa19;
  width:200px;
  height:40px;
  line-height:40px;
  color:white;
  margin-bottom:20px;
  position:relative;
}
.shape:before{
  content:"";
  width:0px;
  height:0px;
  border-top:40px solid #5caa19;
  border-right:40px solid transparent;
  position:absolute;
  left:100%;
  top:0px;
}

.shape-top-img{
  text-align:center;
  background-color:#5caa19;
  width:200px;
  height:30px;
  line-height:30px;
  color:white;
  margin-bottom:20px;
  position:relative;
}
.shape-top-img:before{
  content:"";
  width:0px;
  height:0px;
  border-top:30px solid #5caa19;
  border-right:30px solid transparent;
  position:absolute;
  left:100%;
  top:0px;
}

.shape-bot-img{
  text-align:center;
  background-color:#5caa19;
  width:200px;
  height:30px;
  line-height:30px;
  color:white;
  position:relative;
}
.shape-bot-img:before{
  content:"";
  width:0px;
  height:0px;
  border-bottom:30px solid #5caa19;
  border-left:30px solid transparent;
  position:absolute;
  right :100%;
  top:0px;
}

.alert2 {
    font-size: 12px;
    font-family: sans-serif;
    padding: 12px 10px 10px;
    background-color: #ff9800; /* Red */
    color: white;
    margin-bottom: 20px;
}


/*#solido {

    border-top: 1px solid black;
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    padding-bottom: 20px;


}*/

#indent{
    text-indent:30px;
}

#sect{
  font-size:22px;
  font-family: sans-serif;
  box-sizing: border-box;
    background-color: #d6d6d6;
    color: #666;
    display: inline-block;
    padding: 5px 30px;
    display: block;

}

#lat-derecho {
    background-color: #d6d6d6;
    color: #666;
    font-size: 12px;
    margin-top: 0px;
    margin-bottom: 20px;
    padding: 10px 15px;
    width: 190px;
}

#link{
  color:#5caa19;
}


 /* Style the buttons that are used to open and close the accordion panel */
button.accordion {
    font-size: 22px;
    font-family: sans-serif;
    background-color: #d6d6d6;
    padding: 5px 30px;
    color: #666;
    cursor: pointer;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
    background-color: #5caa19;
    color: white;

}

/* Style the accordion panel. Note: hidden by default */
div.panel2 {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    margin-bottom: 5px;
}

button.accordion:after {
    content: '\02795'; /* Unicode character for "plus" sign (+) */
    font-size: 13px;
    float: right;
    padding: 5px;

}

button.accordion.active:after {
    content: "\2796"; /* Unicode character for "minus" sign (-) */
    color: white;
}

/*css tabla*/
.wrapper {
  margin: 0 auto;
  padding: 10px 40px;
  max-width: 800px;
}
.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}
.row2 {
  display: table-row;
  background: #f6f6f6;
}
.row2:nth-of-type(odd) {
  background: #e9e9e9;
}
.row2.header {
  font-weight: 900;
  color: #666;
  background: #d6d6d6;
}
.row2.green {
  background: #27ae60;
}
.row2.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row2 {
    padding: 8px 0;
    display: block;
  }
}
.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 12px;
    display: block;
  }
}

</style>