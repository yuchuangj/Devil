const BASE_URL="http://localhost:81";
export const myRequest=(options:any)=>{
    return new Promise<any>((resolve:any,reject)=>{
        uni.request({
            url:BASE_URL+options.url,
            method:options.method || "GET",
            data:options.data || {} ,
            dataType:options.dataType || "json",
            success:(res:any)=>{
               resolve(res)
            },
            fail:(err)=>{
                uni.showToast({
                    title:"接口请求错误",
                    icon:"none"
                })
                reject(err)
            }
        })
    })
}
