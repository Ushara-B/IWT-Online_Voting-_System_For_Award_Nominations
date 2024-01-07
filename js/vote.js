
    function submitVote(nomineeId, categoryId) {
      // Check if the user has already submitted a vote for the category
      var hasVoted = checkIfVoted(categoryId);

      if (hasVoted) {
        alert("You have already submitted a vote for this category.");
        return;
      }

      // Generate a unique vote_id
      var voteId = generateVoteId();

      // Send an AJAX request to store the vote in the database
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "store_vote.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          // Handle the response from the server
          var response = xhr.responseText;
          if (response === "success") {
            alert("Vote submitted successfully!");
          } else {
            alert("Failed to submit the vote. Please try again later.");
          }
        }
      };
      xhr.send("voteId=" + voteId + "&nomineeId=" + nomineeId + "&categoryId=" + categoryId);
    }

    function checkIfVoted(categoryId) {
      // Perform a check in the database or local storage to determine if the user has already voted for the category
      // Return true if the user has voted, false otherwise
      // Implement your logic here
    }

    function generateVoteId() {
      // Generate a unique vote_id using a suitable algorithm
      // You can use a library or custom logic to generate a unique vote_id
      // Ensure that the generated vote_id does not already exist in the database
      // Return the generated vote_id
      // Implement your logic here
    }
