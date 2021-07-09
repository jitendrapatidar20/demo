import React from "react";
import { BrowserRouter as Router } from "react-router-dom";

import "react-tiger-transition/styles/main.min.css";
import { Navigation, Route, Screen, Link, glide } from "react-tiger-transition";
// inject glide styles
glide({
  name: 'glide-left'
});
glide({
  name: 'glide-right',
  direction: 'right'
});

const screenStyle = {
  display: "flex",
  alignItems: "center",
  justifyContent: "center"
};

document.getElementById("root").style.height = "100vh";

export default () => (
  <Router>
    <Navigation>
      <Route exact path="/">
        <Screen
          style={{
            backgroundColor: "#ffa000",
            ...screenStyle
          }}
        >
          <Link to="/a" transition='glide-left'>
            Check out the page A
          </Link>

        </Screen>
      </Route>

      <Route
        exact
        path="/a"
        screen // shorthand to wrap children with screen
        screenProps={{
          style: {
            backgroundColor: "#607d8b",
            ...screenStyle
          }
        }}
      >
        <Link to="/" transition='glide-right'>
          Back to home page
        </Link>


      </Route>
    </Navigation>
  </Router>
);
