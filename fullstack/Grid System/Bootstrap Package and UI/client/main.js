import { Template } from 'meteor/templating';
import { ReactiveVar } from 'meteor/reactive-var';
import {Tasks} from '../collections/tasks.js';
import {Accounts} from 'meteor/accounts-base';

Accounts.ui.config({
	passwordSignupFields:'USERNAME_ONLY'
});

import './main.html';

Template.main.onCreated(function mainOnCreated(){
	Meteor.subscribe('tasks');
});

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

		// Insert Task
		Meteor.call('tasks.insert', text);

		// Clear Input
		event.target.text.value = '';

	}
});

Template.task.events({
	'click .toggle-checked'(event){
		Meteor.call('tasks.setChecked', this._id, !this.checked);
	},
	'click .delete'(event){
		Meteor.call('tasks.remove', this._id);
	},
	'click .toggle-private'(){
		Meteor.call('tasks.setPrivate', this._id, !this.private);
	}
});

Template.task.helpers({
	isOwner(){
		return this.owner === Meteor.userId();
	}
});