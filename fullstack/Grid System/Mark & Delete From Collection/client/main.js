import { Template } from 'meteor/templating';
import { ReactiveVar } from 'meteor/reactive-var';
import {Tasks} from '../collections/tasks.js';

import './main.html';

Template.main.helpers({
	title(){
		return 'Quick Todos';
	},
	tasks(){
		return Tasks.find({},{sort:{createdAt:-1}});
	}
});

Template.main.events({
	'submit .add-task'(event){
		event.preventDefault();

		const text = event.target.text.value;

		Tasks.insert({
			text,
			createdAt: new Date(),
		});

		// Clear Input
		event.target.text.value = '';

	}
});

Template.task.events({
	'click .toggle-checked'(event){
		Tasks.update(this._id, {
			$set:{checked: !this.checked}
		});
	},
	'click .delete'(event){
		Tasks.remove(this._id);
	}
});