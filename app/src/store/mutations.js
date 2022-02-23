export default {
	/**
	 * Set module resources
	 * @param state 
	 * @param resources 
	 */
	setResource(state, resources) {
		state.resources = resources
	},

	/**
	 * Screen mode toggle - ON/OFF full screen
	 * @param state
	 */
	screenToggle(state) {
		state.fullScreen = !state.fullScreen;
	},

	/**
	 * Reset app state
	 * @param state
	 */
	resetState(state) {
		state.resources = [];
		state.fullScreen = false;
	},
}