export default {
	/**
	 * Get a list of items
	 * @param state 
	 * @returns 
	 */
	itemList(state) {
		return Object.keys(state.resources)
	},
}