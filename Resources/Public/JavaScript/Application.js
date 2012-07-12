Familiefejden = Ember.Application.create({
	Task : Ember.Object.extend({
		title : 'title'
	}),
	ready: function() {
		console.log(this);
	}
});