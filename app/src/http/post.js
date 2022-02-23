import HTTP from "./axios"

export default {

	/**
	 * Create a resource
	 * @param url
	 * @param formData
	 * @return  {*}
	 */
	create(url, formData) {
		return HTTP.post(url, formData)
	},

	/**
	 * Update resource
	 * @param url
	 * @param formData
	 * @return  {*}
	 */
	update(url, formData) {
		return HTTP.post(url, formData)
	},
	/**
	 * @param url
	 * @param data
	 * @return  {*}
	 */
	delete(url, data) {
		return HTTP.post(url, data)
	}
}