import React from 'react'
import ReactDOM from 'react-dom'
import MenuPage from "./components/MenuPage.jsx";

(function(magic){

    ReactDOM.render(<MenuPage feeds={magic.feeds} />, document.getElementById(magic.rootId))

})(RSSMagic)