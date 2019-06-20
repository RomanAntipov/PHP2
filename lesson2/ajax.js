ajax.run({
	url: <api-url>,
	method: 'POST',
	data: `category= ${data}`,
	callback: function (response) {
		// Response values:
		// response === ‘end’ - нет статей в заданной категории
		// response : [ {title: ‘article_title’, description:‘article_description’, image: ‘article_image’ } ... ]
	if (response === ‘end') { 
			endArticles();
			return;
		}
	renderArticles(JSON.parse(response));
	});