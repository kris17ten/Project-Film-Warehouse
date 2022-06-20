QUnit.test("Test Add Keyword and Get Top Keyword", function (assert) {
	// Create recommender
	var recommender = new Recommender();

	//Ensure that recommender is in empty state - we don't want anything loaded from memory
	recommender.keywords = {};

	//Add some keywords
	recommender.addKeyword("man");
	recommender.addKeyword("man");
	recommender.addKeyword("man");
	recommender.addKeyword("blue");
	recommender.addKeyword("blue");

	//Check that we get the correct recommendation
	assert.strictEqual(recommender.getTopKeyword(), "man");

	//Add another two keywords
	recommender.addKeyword("blue");
	recommender.addKeyword("blue");

	//Check that we get a diffrent top keyword
	assert.strictEqual(recommender.getTopKeyword(), "blue");

});

QUnit.test("Test Save", function (assert) {
	// Create recommender and initialize to known state
	var recommender = new Recommender();
	recommender.keywords = {word1: "blue", word2: "man"};

	//Save state
	recommender.save();

	//Check that the recommender's state has been saved
	assert.deepEqual(JSON.parse(localStorage.recommenderKeywords), recommender.keywords);

});
