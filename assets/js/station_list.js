import { searchWithAutocomplete } from "./search.js";

let input = document.getElementById("search");

var stations = document.querySelector("#stationsArray").innerText.split("//");

searchWithAutocomplete(input, stations);
