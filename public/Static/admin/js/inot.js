/**
 * 消息提示框
 * @param type      通知类型 success: 成功 error: 失败
 * @param info      通知信息
 */
function notify(type,info) {
    swal({
        title: info,
        type: type,
        timer: 1500
    });
}
