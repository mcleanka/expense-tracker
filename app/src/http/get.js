import HTTP from "./axios"

export default {
	/**
	 * Fetch resources
	 * @param url 
	 * @returns {*}
	 */
	index(url) {
		return HTTP.get(url)
	},

	/**
	 * Get a resource
	 * @param url 
	 * @param id 
	 * @returns {*}
	 */
	show(url, id) {
		return HTTP.get(url, { params: { id } })
	}
}