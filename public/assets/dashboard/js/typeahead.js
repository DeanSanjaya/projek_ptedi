$(function() {
  'use strict'

  var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches, substringRegex;

      // an array that will be populated with substring matches
      matches = [];

      // regex used to determine if a string contains the substring `q`
      var substringRegex = new RegExp(q, 'i');

      // iterate through the pool of strings and for any string that
      // contains the substring `q`, add it to the `matches` array
      for (var i = 0; i < strs.length; i++) {
        if (substringRegex.test(strs[i])) {
          matches.push(strs[i]);
        }
      }

      cb(matches);
    };
  };

  fetch("/search_kategori")
        .then((response) => {
            if(!response.ok){ // Before parsing (i.e. decoding) the JSON data,
                              // check for any errors.
                // In case of an error, throw.
                throw new Error("Something went wrong!");
            }
            // Parse the JSON data.

            // data.filter((item) => item.name != 'name')
            response.json().then((data)=>console.log(data));
            // var states = response.json().attr("name");
            // alert(response);
        })
        // .then((data) => {
        //      // This is where you handle what to do with the response.
        //      alert(data); // Will alert: 42
        // })
        .catch((error) => {
             // This is where you handle errors.
        });

  $('#the-basics .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
  }, {
    name: 'states',
    source: substringMatcher(states)
  });
  // constructs the suggestion engine
  var states = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // `states` is an array of state names defined in "The Basics"
    local: states
  });

  $('#bloodhound .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
  }, {
    name: 'states',
    source: states
  });
});