import { Template } from 'meteor/templating';
import { ReactiveVar } from 'meteor/reactive-var';

import './main.html';

const tasks = [
	{text:'Pickup kids from school'},
	{text: 'Go food shopping'},
	{text: 'Meeting with boss'}
];

Template.main.helpers({
	title(){
		return 'Quick Todos';
	},
	tasks(){
		return tasks;
	}
});