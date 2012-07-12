Familiefejden.StateManager = Ember.StateManager.create({
	start: Ember.State.extend({
		index: Ember.State.extend({
			route: "/",
			setupContext: function(manager) {
				//manager.transitionTo('posts.index')
				console.log(manager);
			}
		})
	})
});