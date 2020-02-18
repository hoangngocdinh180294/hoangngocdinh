import request from '@/utils/request'

const prefix = 'ajax/'

export function listApi(query) {
  return request({
    url: prefix + 'projects',
    method: 'get',
    params: query
  })
}

export function getApi(id) {
  return request({
    url: prefix + 'projects/' + id,
    method: 'get'
  })
}

export function createApi(data) {
  return request({
    url: prefix + 'projects',
    method: 'post',
    data
  })
}

export function updateApi(id, data) {
  return request({
    url: prefix + 'projects/' + id,
    method: 'patch',
    data
  })
}
